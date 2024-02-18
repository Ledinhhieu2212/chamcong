<?php

namespace Database\Factories;

use App\Models\timekeep;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\timekeep>
 */
class timekeepFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'start_date' => Carbon::now()->startOfMonth()->addDays(9),
            'end_date' =>  Carbon::now()->addMonth()->startOfMonth()->addDays(9),
        ];
    }
}
