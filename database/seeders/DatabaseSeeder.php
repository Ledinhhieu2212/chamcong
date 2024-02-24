<?php

namespace Database\Seeders;

use App\Models\Day_Works;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Time;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            UserSeeder::class,
            QrCodeSeeder::class,
            CalendarSeeder::class,
            Detail_CalendarSeeder::class,
            Day_WorkSeeder::class,
            ShiftSeeder::class,
        ]);
    }
}
