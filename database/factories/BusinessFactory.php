<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\Country;
use App\Models\BusinessCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company, 
            'address' => $this->faker->address, 
            'state' => $this->faker->state, 
            'zip_code' => $this->faker->postcode,
            'business_category_id' => BusinessCategory::inRandomOrder()->first()->id,
            'country' => fake()->randomElement(array_values(Country::toArray())),
            'user_id' => 1,
            'step_number' => 1, 
        ];
    }
}
