<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Board;
use App\Enums\CategoryTypeEnum;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'board_id' => Board::factory()->create(),
            'category' => fake()->randomElement(CategoryTypeEnum::cases()),
            'body' => fake()->text(30)
        ];
    }
}
