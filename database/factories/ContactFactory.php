<?php

namespace Database\Factories;

use id;
use App\Enums\Country;
use App\Models\Tenant;
use App\Enums\Language;
use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'business_id' => Business::inRandomOrder()->first()->id,
            'name' => fake()->name(),
            'organisation' => fake()->company(),
            'email' => fake()->safeEmail(),
            'billing_email' => fake()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'mobile_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'town' => fake()->city(),
            'region' => fake()->state(),
            'zip_code' => fake()->postcode(),
            'country' => fake()->randomElement(array_values(Country::toArray())),
            'contact_level_email' => fake()->boolean(),
            'contact_level_invoice' => fake()->boolean(),
            'display_contact_name' => fake()->boolean(),
            'default_payment_terms' => fake()->randomElement([30, 60, 90]),
            'sales_tax_registration_number' => fake()->randomNumber(5),
            'invoice_language' => fake()->randomElement(array_values(Language::toArray())),
            'created_at' => fake()->dateTime(),
        ];
    }
}
