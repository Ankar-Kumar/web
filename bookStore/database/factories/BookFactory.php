<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
        //faker class dia book table toiri krbo use fake data
        return [
            'title'=> fake()->sentence,
            'author'=> fake()->name,
            'isbn' => fake()->isbn13(),
            'stock' => fake()->numberBetween(0, 50),
            'price' => fake()->randomFloat(2, 18, 100),

        ];
    }
}
