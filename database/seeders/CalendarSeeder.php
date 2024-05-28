<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Calendar::query()->delete();
        $calendar1 = Calendar::create([
            'start_date' => Carbon::parse("2024-5-6 00:00:00"),
            'end_date' => Carbon::parse("2024-5-12 00:00:00"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar2 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-29 00:00:00"),
            'end_date' => Carbon::parse("2024-5-5 00:00:00"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar3 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-22"),
            'end_date' => Carbon::parse("2024-4-28"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar4 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-15"),
            'end_date' => Carbon::parse("2024-4-21"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar5 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-8"),
            'end_date' => Carbon::parse("2024-4-14"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar6 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-8"),
            'end_date' => Carbon::parse("2024-4-14"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar7 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-1"),
            'end_date' => Carbon::parse("2024-4-7"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar8 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-25"),
            'end_date' => Carbon::parse("2024-3-31"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar9 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-8"),
            'end_date' => Carbon::parse("2024-4-14"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar10 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-18"),
            'end_date' => Carbon::parse("2024-3-24"),
            "open_port" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $users = User::all();
        $calendars = Calendar::all();
        foreach ($users as $user) {
            foreach ($calendars as $calendar) {
                $calendar->users()->attach($user->id);
            }
        }
    }
}
