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
            'start_date' => Carbon::parse("2024-1-31 00:00:00"),
            'end_date' => Carbon::parse("2024-2-6 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar2 = Calendar::create([
            'start_date' => Carbon::parse("2024-2-7 00:00:00"),
            'end_date' => Carbon::parse("2024-2-13 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar3 = Calendar::create([
            'start_date' => Carbon::parse("2024-2-14 00:00:00"),
            'end_date' => Carbon::parse("2024-2-20 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar4 = Calendar::create([
            'start_date' => Carbon::parse("2024-2-21 00:00:00"),
            'end_date' => Carbon::parse("2024-2-27 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar5 = Calendar::create([
            'start_date' => Carbon::parse("2024-2-28 00:00:00"),
            'end_date' => Carbon::parse("2024-3-3 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $calendar6 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-4 00:00:00"),
            'end_date' => Carbon::parse("2024-3-10 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar7 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-11 00:00:00"),
            'end_date' => Carbon::parse("2024-3-17 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $calendar8 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-18 00:00:00"),
            'end_date' => Carbon::parse("2024-3-24 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar9 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-25 00:00:00"),
            'end_date' => Carbon::parse("2024-3-31 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar10 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-1 00:00:00"),
            'end_date' => Carbon::parse("2024-4-7 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar11 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-8 00:00:00"),
            'end_date' => Carbon::parse("2024-4-14 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar12 = Calendar::create([
            'start_date' => Carbon::parse("2024-3-11 00:00:00"),
            'end_date' => Carbon::parse("2024-3-17 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $calendar13 = Calendar::create([
            'start_date' => Carbon::parse("2024-4-15 00:00:00"),
            'end_date' => Carbon::parse("2024-4-21 00:00:00"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $users = User::all();
        $calendars = Calendar::all();
        foreach ($users as $user) {
            $randomCalendars = $calendars->random(mt_rand(1, count($calendars)));
            foreach ($randomCalendars as $calendar) {
                $calendar->users()->attach($user->id);
            }
        }
    }
}
