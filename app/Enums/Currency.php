<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum Currency: string
{
    use EnumHelper;
    
    case USD = 'usd'; // US Dollar
    case EUR = 'eur'; // Euro
    case GBP = 'gbp'; // British Pound
    case JPY = 'jpy'; // Japanese Yen
    case AUD = 'aud'; // Australian Dollar
    case CAD = 'cad'; // Canadian Dollar
    case CHF = 'chf'; // Swiss Franc
    case CNY = 'cny'; // Chinese Yuan
    case HKD = 'hkd'; // Hong Kong Dollar
    case NZD = 'nzd'; // New Zealand Dollar
    case SEK = 'sek'; // Swedish Krona
    case NOK = 'nok'; // Norwegian Krone
    case MXN = 'mxn'; // Mexican Peso
    case SGD = 'sgd'; // Singapore Dollar
    case INR = 'inr'; // Indian Rupee
    case RUB = 'rub'; // Russian Ruble
    case ZAR = 'zar'; // South African Rand
    case BRL = 'brl'; // Brazilian Real
    case AED = 'aed'; // UAE Dirham
    case SAR = 'sar'; // Saudi Riyal
    case EGP = 'egp'; // Egyptian Pound
    case KWD = 'kwd'; // Kuwaiti Dinar
    case QAR = 'qar'; // Qatari Riyal
    case OMR = 'omr'; // Omani Rial
    case JOD = 'jod'; // Jordanian Dinar
    case BHD = 'bhd'; // Bahraini Dinar
    case TRY = 'try'; // Turkish Lira
    case KRW = 'krw'; // South Korean Won
    case THB = 'thb'; // Thai Baht
    case MYR = 'myr'; // Malaysian Ringgit
    case PKR = 'pkr'; // Pakistani Rupee
    case IDR = 'idr'; // Indonesian Rupiah
    case PHP = 'php'; // Philippine Peso
    case VND = 'vnd'; // Vietnamese Dong
    case NGN = 'ngn'; // Nigerian Naira
    case ARS = 'ars'; // Argentine Peso
    case COP = 'cop'; // Colombian Peso
    case CLP = 'clp'; // Chilean Peso
    case PEN = 'pen'; // Peruvian Sol
    case UYU = 'uyu'; // Uruguayan Peso
    case DZD = 'dzd'; // Algerian Dinar
    case MAD = 'mad'; // Moroccan Dirham
    case TND = 'tnd'; // Tunisian Dinar
    case LBP = 'lbp'; // Lebanese Pound
    case SYP = 'syp'; // Syrian Pound
    case SDG = 'sdg'; // Sudanese Pound
    case IQD = 'iqd'; // Iraqi Dinar
    case LYD = 'lyd'; // Libyan Dinar
    case XAF = 'xaf'; // Central African CFA Franc
    case XOF = 'xof'; // West African CFA Franc

}
