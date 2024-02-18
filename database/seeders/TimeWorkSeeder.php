<?php

namespace Database\Seeders;

use App\Models\timework;
use Database\Factories\TimeWorkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        timework::factory()
            ->count(1)
            ->create();
    }
}
