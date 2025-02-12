<?php

namespace Database\Factories;

use App\Enums\Bill_Recurs;
use App\Models\Tenant;
use App\Models\Contact;
use App\Models\Business;
use App\Models\Currency;
use App\Models\BusinessCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bill>
 */
class billFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::inRandomOrder()->first()->id,
            'contact_id' => Contact::inRandomOrder()->first()->id,
            'business_id' => Business::inRandomOrder()->first()->id,
            'reference' => fake()->randomNumber(5),
            'bill_date' => fake()->date(),
            'due_on' => fake()->date(),
            'currency_id' => Currency::inRandomOrder()->first()->id,
            'is_tax_included' => fake()->randomElement(['including', 'excluding']),
            'comment' => fake()->text(),
            'item_category_type' => fake()->randomElement(['single', 'multiple']),
            'business_category_id' => BusinessCategory::inRandomOrder()->first()->id,
            'total_price' => fake()->randomFloat(2, 10, 1000),
            'bill_recurs' => fake()->randomElement(array_values(Bill_Recurs::toArray())),
            'attachment_description' => fake()->text(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
