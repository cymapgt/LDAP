<?php
/**
 * This file is part of the FreeDSx LDAP package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FreeDSx\Ldap\Control;

/**
 * Possible Password Policy Error values. draft-behera-ldap-password-policy-10, Section 6.2.
 *
 * @see https://tools.ietf.org/html/draft-behera-ldap-password-policy-10
 * @author Chad Sikorra <Chad.Sikorra@gmail.com>
 */
class PwdPolicyError
{
    const PASSWORD_EXPIRED = 0;

    const ACCOUNT_LOCKED = 1;

    const CHANGE_AFTER_RESET = 2;

    const PASSWORD_MOD_NOT_ALLOWED = 3;

    const MUST_SUPPLY_OLD_PASSWORD = 4;

    const INSUFFICIENT_PASSWORD_QUALITY = 5;

    const PASSWORD_TOO_SHORT = 6;

    const PASSWORD_TOO_YOUNG = 7;

    const PASSWORD_IN_HISTORY = 8;
}
