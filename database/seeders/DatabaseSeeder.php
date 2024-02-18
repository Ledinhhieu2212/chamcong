<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Time;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TimekeepSeeder::class,
            CalendarSeeder::class,
            TimeWorkSeeder::class,
        ]);
    }
}
