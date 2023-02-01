<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'      => fake()->realText(40),
            'content'    => fake()->realText,
            'author_id'  => User::inRandomOrder()->first()->id,
            'created_at' => fake()->date,
        ];
    }
}
