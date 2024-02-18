<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeWork>
 */
class TimeWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calendar_id' => rand(1,7),
            'check_in' => Carbon::now()->startOfDay()->addHours(rand(7, 9))->addMinutes(random_int(1,60)),
            'check_out' =>  Carbon::now()->startOfDay()->addHours(rand(10, 12))->addMinutes(random_int(1,60)),
        ];
    }
}
