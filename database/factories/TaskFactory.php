<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['title' => "string", 'body' => "string", 'user_id' => "integer"])] public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->title,
            'body' => $this->faker->text
        ];
    }
}
