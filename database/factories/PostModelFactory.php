<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post\PostModel>
 */
class PostModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image' => 'hero_' . $this->faker->numberBetween(1, 6),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Business', 'Travel', 'Politics', 'Culture']),
            'user_id' => $this->faker->numberBetween(1, 100),
            'user_name' => $this->faker->name,
            'created_at' => now(),
        ];
    }
}


