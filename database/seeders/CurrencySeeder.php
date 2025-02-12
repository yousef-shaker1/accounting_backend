<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'United States Dollar'],
            ['code' => 'EUR', 'name' => 'Euro'],
            ['code' => 'JPY', 'name' => 'Japanese Yen'],
            ['code' => 'GBP', 'name' => 'British Pound Sterling'],
            ['code' => 'AUD', 'name' => 'Australian Dollar'],
            ['code' => 'CAD', 'name' => 'Canadian Dollar'],
            ['code' => 'CHF', 'name' => 'Swiss Franc'],
            ['code' => 'CNY', 'name' => 'Chinese Yuan'],
            ['code' => 'SEK', 'name' => 'Swedish Krona'],
            ['code' => 'NZD', 'name' => 'New Zealand Dollar'],
            ['code' => 'EGP', 'name' => 'Egyptian Pound'],
            ['code' => 'KWD', 'name' => 'Kuwaiti Dinar'],
            ['code' => 'HKD', 'name' => 'Hong Kong Dollar'],
            ['code' => 'NOK', 'name' => 'Norwegian Krone'],
            ['code' => 'MXN', 'name' => 'Mexican Peso'],
            ['code' => 'SGD', 'name' => 'Singapore Dollar'],
            ['code' => 'INR', 'name' => 'Indian Rupee'],
            ['code' => 'RUB', 'name' => 'Russian Ruble'],
            ['code' => 'ZAR', 'name' => 'South African Rand'],
            ['code' => 'BRL', 'name' => 'Brazilian Real'],
            ['code' => 'AED', 'name' => 'UAE Dirham'],
            ['code' => 'SAR', 'name' => 'Saudi Riyal'],
            ['code' => 'QAR', 'name' => 'Qatari Riyal'],
            ['code' => 'OMR', 'name' => 'Omani Rial'],
            ['code' => 'JOD', 'name' => 'Jordanian Dinar'],
            ['code' => 'BHD', 'name' => 'Bahraini Dinar'],
            ['code' => 'TRY', 'name' => 'Turkish Lira'],
            ['code' => 'KRW', 'name' => 'South Korean Won'],
            ['code' => 'THB', 'name' => 'Thai Baht'],
            ['code' => 'MYR', 'name' => 'Malaysian Ringgit'],
            ['code' => 'PKR', 'name' => 'Pakistani Rupee'],
            ['code' => 'IDR', 'name' => 'Indonesian Rupiah'],
            ['code' => 'PHP', 'name' => 'Philippine Peso'],
            ['code' => 'VND', 'name' => 'Vietnamese Dong'],
            ['code' => 'NGN', 'name' => 'Nigerian Naira'],
            ['code' => 'ARS', 'name' => 'Argentine Peso'],
            ['code' => 'COP', 'name' => 'Colombian Peso'],
            ['code' => 'CLP', 'name' => 'Chilean Peso'],
            ['code' => 'PEN', 'name' => 'Peruvian Sol'],
            ['code' => 'UYU', 'name' => 'Uruguayan Peso'],
            ['code' => 'DZD', 'name' => 'Algerian Dinar'],
            ['code' => 'MAD', 'name' => 'Moroccan Dirham'],
            ['code' => 'TND', 'name' => 'Tunisian Dinar'],
            ['code' => 'LBP', 'name' => 'Lebanese Pound'],
            ['code' => 'SYP', 'name' => 'Syrian Pound'],
            ['code' => 'SDG', 'name' => 'Sudanese Pound'],
            ['code' => 'IQD', 'name' => 'Iraqi Dinar'],
            ['code' => 'LYD', 'name' => 'Libyan Dinar'],
            ['code' => 'XAF', 'name' => 'Central African CFA Franc'],
            ['code' => 'XOF', 'name' => 'West African CFA Franc'],
        ];

        DB::table('currencies')->insert($currencies);
    }
}
