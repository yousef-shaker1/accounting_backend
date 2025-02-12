<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\BankSeeder;
use Database\Seeders\TenantSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\invoiceSeeder;
use Database\Seeders\BusinessSeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\TimezoneSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(TenantSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'sFt4I@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            BusinessCategorySeeder::class,
            CurrencySeeder::class,
            BusinessSeeder::class,
            ContactSeeder::class,
            invoiceSeeder::class,
            BankSeeder::class,
            TimezoneSeeder::class,
        ]);
        

    }
}
