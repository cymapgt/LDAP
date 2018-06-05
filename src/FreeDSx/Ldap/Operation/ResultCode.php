<?php
/**
 * This file is part of the FreeDSx LDAP package.
 *
 * (c) Chad Sikorra <Chad.Sikorra@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FreeDSx\Ldap\Operation;

/**
 * Message response result codes. Defined in RFC 4511, 4.1.9
 *
 * @author Chad Sikorra <Chad.Sikorra@gmail.com>
 */
class ResultCode
{
    const SUCCESS = 0;

    const OPERATIONS_ERROR = 1;

    const PROTOCOL_ERROR = 2;

    const TIME_LIMIT_EXCEEDED = 3;

    const SIZE_LIMIT_EXCEEDED = 4;

    const COMPARE_FALSE = 5;

    const COMPARE_TRUE = 6;

    const AUTH_METHOD_UNSUPPORTED = 7;

    const STRONGER_AUTH_REQUIRED = 8;

    const REFERRAL = 10;

    const ADMIN_LIMIT_EXCEEDED = 11;

    const UNAVAILABLE_CRITICAL_EXTENSION = 12;

    const CONFIDENTIALITY_REQUIRED = 13;

    const SASL_BIND_IN_PROGRESS = 14;

    const NO_SUCH_ATTRIBUTE = 16;

    const UNDEFINED_ATTRIBUTE_TYPE = 17;

    const INAPPROPRIATE_MATCHING = 18;

    const CONSTRAINT_VIOLATION = 19;

    const ATTRIBUTE_OR_VALUE_EXISTS = 20;

    const INVALID_ATTRIBUTE_SYNTAX = 21;

    const NO_SUCH_OBJECT = 32;

    const ALIAS_PROBLEM = 33;

    const INVALID_DN_SYNTAX = 34;

    const ALIAS_DEREFERENCING_PROBLEM = 36;

    const INAPPROPRIATE_AUTHENTICATION = 48;

    const INVALID_CREDENTIALS = 49;

    const INSUFFICIENT_ACCESS_RIGHTS = 50;

    const BUSY = 51;

    const UNAVAILABLE = 52;

    const UNWILLING_TO_PERFORM = 53;

    const LOOP_DETECT = 54;

    const SORT_CONTROL_MISSING = 60;

    const OFFSET_RANGE_ERROR = 61;

    const NAMING_VIOLATION = 64;

    const OBJECT_CLASS_VIOLATION = 65;

    const NOT_ALLOWED_ON_NON_LEAF = 66;

    const NOT_ALLOWED_ON_RDN = 67;

    const ENTRY_ALREADY_EXISTS = 68;

    const OBJECT_CLASS_MODS_PROHIBITED = 69;

    const AFFECTS_MULTIPLE_DSAS = 71;

    const VIRTUAL_LIST_VIEW_ERROR = 76;

    const OTHER = 80;

    const CANCELED = 118;

    const NO_SUCH_OPERATION = 119;

    const TOO_LATE = 120;

    const CANNOT_CANCEL = 121;

    const ASSERTION_FAILED = 122;

    const AUTHORIZATION_DENIED = 123;

    const SYNCHRONIZATION_REFRESH_REQUIRED = 4096;
}
