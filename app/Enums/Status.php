<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum Status: string
{
    use EnumHelper;
    case DRAFT = 'draft';
    case SENT = 'sent';
    case PAID = 'paid';
}
