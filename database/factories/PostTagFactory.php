<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PostTag;
use App\Models\Post;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTag>
 */
class PostTagFactory extends Factory
{ 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}