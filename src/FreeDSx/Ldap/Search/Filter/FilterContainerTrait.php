<?php
/**
 * This file is part of the FreeDSx package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FreeDSx\Ldap\Search\Filter;

use FreeDSx\Ldap\Asn1\Asn1;
use FreeDSx\Ldap\Asn1\Encoder\BerEncoder;
use FreeDSx\Ldap\Asn1\Type\AbstractType;
use FreeDSx\Ldap\Asn1\Type\IncompleteType;
use FreeDSx\Ldap\Asn1\Type\SetType;
use FreeDSx\Ldap\Exception\ProtocolException;
use FreeDSx\Ldap\Protocol\Factory\FilterFactory;

/**
 * Methods needed to implement the filter container interface.
 *
 * @author Chad Sikorra <Chad.Sikorra@gmail.com>
 */
trait FilterContainerTrait
{
    /**
     * @var FilterInterface[]
     */
    protected $filters;

    /**
     * @param FilterInterface[] ...$filters
     */
    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    /**
     * @param FilterInterface[] ...$filters
     * @return $this
     */
    public function add(FilterInterface ...$filters)
    {
        foreach ($filters as $filter) {
            $this->filters[] = $filter;
        }

        return $this;
    }

    /**
     * @param FilterInterface $filter
     * @return bool
     */
    public function has(FilterInterface $filter) : bool
    {
        return array_search($filter, $this->filters, true) !== false;
    }

    /**
     * @param FilterInterface[] ...$filters
     * @return $this
     */
    public function remove(FilterInterface ...$filters)
    {
        foreach ($filters as $filter) {
            if (($i = array_search($filter, $this->filters, true)) !== false) {
                unset($this->filters[$i]);
            }
        }

        return $this;
    }

    /**
     * @param FilterInterface[] ...$filters
     * @return $this
     */
    public function set(FilterInterface ...$filters)
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return FilterInterface[]
     */
    public function get() : array
    {
        return $this->filters;
    }

    /**
     * {@inheritdoc}
     */
    public function toAsn1() : AbstractType
    {
        return Asn1::context(self::CHOICE_TAG, Asn1::setOf(
            ...array_map(function ($filter) {
                /** @var FilterInterface $filter */
                return $filter->toAsn1();
            }, $this->filters)
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function fromAsn1(AbstractType $type)
    {
        $type = $type instanceof IncompleteType ? (new BerEncoder())->complete($type, AbstractType::TAG_TYPE_SET) : $type;
        if (!($type instanceof SetType)) {
            throw new ProtocolException('The filter is malformed');
        }

        $filters = [];
        foreach ($type->getChildren() as $child) {
            $filters[] = FilterFactory::get($child);
        }

        return new self(...$filters);
    }
}
