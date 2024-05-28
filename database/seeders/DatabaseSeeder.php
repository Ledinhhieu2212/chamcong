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
            AdminSeeder::class,
            PositionSeeder::class,
            UserSeeder::class,
            QrCodeSeeder::class,
            CalendarSeeder::class,
            ScheduleSeeder::class,
            TimekeepSeeder::class,
            SalarySeeder::class,
        ]);
    }
}
