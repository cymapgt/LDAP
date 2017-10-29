<?php
/**
 * This file is part of the FreeDSx package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\FreeDSx\Ldap\Search\Filter;

use FreeDSx\Ldap\Asn1\Asn1;
use FreeDSx\Ldap\Search\Filter\EqualityFilter;
use FreeDSx\Ldap\Search\Filter\NotFilter;
use FreeDSx\Ldap\Search\Filters;
use PhpSpec\ObjectBehavior;

class NotFilterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Filters::equal('foo', 'bar'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(NotFilter::class);
    }

    function it_should_set_the_filter()
    {
        $this->set(Filters::gte('foobar', 'foo'));
        $this->get()->shouldBeLike(Filters::gte('foobar', 'foo'));
    }

    function it_should_generate_correct_asn1()
    {
        $this->toAsn1()->shouldBeLike(Asn1::context(2, Asn1::sequence(Filters::equal('foo', 'bar')->toAsn1())));
    }

    function it_should_be_constructed_from_asn1()
    {
        $this::fromAsn1((new NotFilter(Filters::equal('foo', 'bar')))->toAsn1())->shouldBeLike(
            new NotFilter(new EqualityFilter('foo', 'bar'))
        );
    }
}
