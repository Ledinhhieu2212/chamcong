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
            'date_now' => $currentMonth = Carbon::now(),
            'start_date' => $currentMonth->copy()->firstOfMonth(),
            'end_date' => $currentMonth->copy()->lastOfMonth(),
            'is_calendar_enabled' => 1,
        ]);
    }
}
