<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum Language: string
{
    use EnumHelper;
    
    case ENGLISH = 'english';
    case FRENCH = 'french';
    case SPANISH = 'spanish';
    case GERMAN = 'german';
}

