<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
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
            'account_name' => fake()->name(),
            'currency_id' => Currency::inRandomOrder()->first()->id,
            'status' => fake()->randomElement(['active', 'hidden']),
            'personal_account' => fake()->boolean(),
            'primary_account' => fake()->boolean(),
            'bank_name' => fake()->company(), 
            'account_number' => fake()->bankAccountNumber(),
            'routing_number' => fake()->numerify('########'),
            'details_on_invoices' => fake()->boolean(),
            'balance' => fake()->randomFloat(2, 0, 10000),
            'guess_explanations' => fake()->boolean(),
            'sort_code' => fake()->numerify('######'),
            'iban' => fake()->iban(),
            'bic' => fake()->swiftBicNumber(),
        ];
    }
}
