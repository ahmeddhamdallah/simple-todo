<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Board;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardUser>
 */
class BoardUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'board_id' => Board::factory()->create(),
        ];
    }
}
