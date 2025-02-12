<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Accounting & Finance'],
            ['name' => 'Advertising & Marketing'],
            ['name' => 'Business Consulting'],
            ['name' => 'Construction & Engineering'],
            ['name' => 'Creative & Design'],
            ['name' => 'Education & Training'],
            ['name' => 'Healthcare & Wellness'],
            ['name' => 'IT & Software Development'],
            ['name' => 'Legal Services'],
            ['name' => 'Real Estate & Property'],
            ['name' => 'Retail & E-commerce'],
            ['name' => 'Transportation & Logistics'],
            ['name' => 'Hospitality & Tourism'],
            ['name' => 'Manufacturing & Production'],
            ['name' => 'Media & Entertainment'],
            ['name' => 'Non-profit & Social Services'],
            ['name' => 'Energy & Utilities'],
            ['name' => 'Food & Beverage'],
            ['name' => 'Human Resources & Recruitment'],
            ['name' => 'Insurance'],
            ['name' => 'Public Relations'],
            ['name' => 'Research & Development'],
            ['name' => 'Sales & Business Development'],
            ['name' => 'Supply Chain & Procurement'],
        ];

        DB::table('business_categories')->insert($categories);
    }
}
