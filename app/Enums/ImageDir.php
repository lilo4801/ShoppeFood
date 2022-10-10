<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ImageDir extends Enum
{
    const IMAGE = '\image';
    const IMAGE_CATEGORY_FOOD = '\image\category';
    const IMAGE_STORE_FOOD = '\image\store';
    const IMAGE_FOOD = '\image\foods';
    const IMAGE_EXTRA_FOOD = '\image\extrafoods';


}
