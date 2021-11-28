<?php

namespace trianstudios\Press\Database\Factories;

use Illuminate\Support\Str;
use trianstudios\Press\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identifier' => Str::random(),
            'slug' => Str::slug($this->faker->sentence),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'extra' => json_encode(['test' => 'value'])
        ];
    }
}