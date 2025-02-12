<?php

namespace App\Enums;
use App\Traits\EnumHelper;

enum DateFormatEnum: string
{

    use EnumHelper;

    case YMD = 'Y-m-d';
    case MDY = 'm-d-Y';
    case DMY = 'd-m-Y';
}
