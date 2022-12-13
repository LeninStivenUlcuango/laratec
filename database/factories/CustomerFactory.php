<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'last_name'=>fake()->lastName(),
            'id_number'=>fake()->unique()->randomNumber(8),
            'email'=>fake()->email(),
            'addres'=>fake()->address(),
            'phone'=>fake()->phoneNumber(),
        ];
    }
}
