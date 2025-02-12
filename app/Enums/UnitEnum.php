<?php

namespace App\Enums;
use App\Traits\EnumHelper;

enum UnitEnum: string
{
    use EnumHelper;

    case KG = 'kg';
    case MILE = 'mile';
}
