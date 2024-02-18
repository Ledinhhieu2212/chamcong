<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'timekeep_id' => 1,
            'day' => fake()->unique()->numberBetween(1, 7),
            'morning' => random_int(0, 1),
            'afternoon' => random_int(0, 1),
            'evening' => random_int(0, 1),
            'night' => random_int(0, 1),
        ];
    }
}
