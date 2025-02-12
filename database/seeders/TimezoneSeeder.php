<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = [
            ['timezone' => 'Europe/Sofia', 'name' => '(GMT+02:00) Sofia'],
            ['timezone' => 'Europe/Tallinn', 'name' => '(GMT+02:00) Tallinn'],
            ['timezone' => 'Europe/Vilnius', 'name' => '(GMT+02:00) Vilnius'],
            ['timezone' => 'Asia/Baghdad', 'name' => '(GMT+03:00) Baghdad'],
            ['timezone' => 'Europe/Istanbul', 'name' => '(GMT+03:00) Istanbul'],
            ['timezone' => 'Asia/Kuwait', 'name' => '(GMT+03:00) Kuwait'],
            ['timezone' => 'Europe/Minsk', 'name' => '(GMT+03:00) Minsk'],
            ['timezone' => 'Europe/Moscow', 'name' => '(GMT+03:00) Moscow'],
            ['timezone' => 'Africa/Nairobi', 'name' => '(GMT+03:00) Nairobi'],
            ['timezone' => 'Asia/Riyadh', 'name' => '(GMT+03:00) Riyadh'],
            ['timezone' => 'Europe/St_Petersburg', 'name' => '(GMT+03:00) St. Petersburg'],
            ['timezone' => 'Europe/Volgograd', 'name' => '(GMT+03:00) Volgograd'],
            ['timezone' => 'Asia/Tehran', 'name' => '(GMT+03:30) Tehran'],
            ['timezone' => 'Asia/Abu_Dhabi', 'name' => '(GMT+04:00) Abu Dhabi'],
            ['timezone' => 'Asia/Baku', 'name' => '(GMT+04:00) Baku'],
        ];

        DB::table('timezones')->insert($timezones);
    }
}
