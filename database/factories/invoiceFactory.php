<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Contact;
use App\Models\Business;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class invoiceFactory extends Factory
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
            'invoice_reference' => fake()->randomNumber(5),
            'invoice_date' => fake()->date(),
            'payment_terms' => fake()->randomNumber(2),
            'currency_id' => Currency::inRandomOrder()->first()->id,
            'additional_text' => fake()->text(),
            'invoice_discount' => fake()->randomFloat(2, 0, 100),
            'custom_contact_name' => fake()->name(),
            'custom_payment_terms' => fake()->sentence(),
            'po_reference' => fake()->sentence(),
            'amount' => fake()->randomFloat(2, 100, 1000),
            'is_letterheaded' => fake()->boolean(),
            'display_project_name' => fake()->boolean(),
            'display_bic_iban' => fake()->boolean(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
