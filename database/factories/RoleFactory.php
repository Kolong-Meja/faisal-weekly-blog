<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['admin', 'super admin']),
            'description' => fake()->sentence(10),
            'abilities' => $this->faker->randomElement(['create, view', 'create, view, edit, delete']),
            'status' => $this->faker->randomElement(),
        ];
    }
}
