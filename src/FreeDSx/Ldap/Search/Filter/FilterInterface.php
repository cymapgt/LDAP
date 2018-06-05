<?php
/**
 * This file is part of the FreeDSx LDAP package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FreeDSx\Ldap\Search\Filter;

use FreeDSx\Ldap\Protocol\ProtocolElementInterface;

/**
 * Used to represent filters for search requests.
 *
 * @author Chad Sikorra <Chad.Sikorra@gmail.com>
 */
interface FilterInterface extends ProtocolElementInterface
{
    const PAREN_LEFT = '(';

    const PAREN_RIGHT = ')';

    const OPERATOR_AND = '&';

    const OPERATOR_OR = '|';

    const OPERATOR_NOT = '!';

    const FILTER_EQUAL = '=';

    const FILTER_APPROX = '~=';

    const FILTER_GTE = '>=';

    const FILTER_LTE = '<=';

    const FILTER_EXT = ':=';

    const OPERATORS = [
        self::OPERATOR_NOT,
        self::OPERATOR_OR,
        self::OPERATOR_AND,
    ];

    const FILTERS = [
        self::FILTER_EQUAL,
        self::FILTER_APPROX,
        self::FILTER_GTE,
        self::FILTER_LTE,
        self::FILTER_EXT,
    ];

    /**
     * Get the string representation of the filter.
     *
     * @return string
     */
    public function toString() : string;
}
