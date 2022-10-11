<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CartStatus extends Enum
{
    const REJECT_ORDER = -1;
    const SHOPPING = 0;
    const CONFIRM_ORDER = 1;
    const ACCEPT_ORDER = 2;
    const SHIPPING = 3;
    const GET_PRODUCT = 3;
}
