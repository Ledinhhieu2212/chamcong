<?php

namespace Database\Seeders;

use App\Models\calendar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('calendars')->insert([
            'id' => 1,
            'date_now' => Carbon::parse("2023-12-30 00:00:00"),
            'start_date' => Carbon::parse("2024-1-10 00:00:00"),
            'end_date' => Carbon::parse("2024-2-10 00:00:00"),
            'is_calendar_enabled' => 1,
        ]);

        DB::table('calendars')->insert([
            'id' => 2,
            'date_now' => Carbon::parse("2024-1-30 00:00:00"),
            'start_date' => Carbon::parse("2024-2-10 00:00:00"),
            'end_date' => Carbon::parse("2024-3-10 00:00:00"),
            'is_calendar_enabled' => 1,
        ]);

        DB::table('calendars')->insert([
            'id' => 3,
            'date_now' => Carbon::parse("2024-2-30 00:00:00"),
            'start_date' => Carbon::parse("2024-3-10 00:00:00"),
            'end_date' => Carbon::parse("2024-4-10 00:00:00"),
            'is_calendar_enabled' => 1,
        ]);

        DB::table('calendars')->insert([
            'id' => 4,
            'date_now' => Carbon::parse("2024-3-30 00:00:00"),
            'start_date' => Carbon::parse("2024-4-10 00:00:00"),
            'end_date' => Carbon::parse("2024-5-10 00:00:00"),
            'is_calendar_enabled' => 1,
        ]);
    }
}
