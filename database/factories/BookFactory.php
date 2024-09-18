<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' =>fake()->text(),
            'country_id'=> fake()->numberBetween(1,50),
            'stocks' => fake()->numberBetween(1,100),
            'amount'=> fake()->randomFloat(2, 0, 1000),
            'photo' => fake()->text()
        ];
    }
}
