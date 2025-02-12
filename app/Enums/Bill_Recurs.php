<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum Bill_Recurs: string
{
    use EnumHelper;

    case WEEKLY = 'weekly';
    case TWO_WEEKLY = 'two_weekly';
    case FOUR_WEEKLY = 'four_weekly';
    case MONTHLY = 'monthly';
    case TWO_MONTHLY = 'two_monthly';
    case QUARTERLY = 'quarterly';
    case BIANNUALLY = 'biannually';
    case ANNUALLY = 'annually';
    case TWO_YEARLY = '2-yearly';

}
