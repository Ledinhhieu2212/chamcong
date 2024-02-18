<?php

namespace Database\Seeders;

use App\Models\timekeep;
use Database\Factories\timekeepFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimekeepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        timekeep::factory()
            ->count(1)
            ->create();
    }
}
