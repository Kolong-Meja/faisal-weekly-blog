<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => Str::headline($this->faker->sentence(5)),
            'description' => fake()->sentence(10),
            'meta_title' => Str::limit(Str::headline($this->faker->sentence(5)), 60),
            'slug' => Str::slug($this->faker->sentence(5), '-'),
            'content' => fake()->paragraph(50, true),
            'keywords' => fake()->words(5, true),
            "status" => $this->faker->randomElement(["not verified", "verified"]),
        ];
    }
}
