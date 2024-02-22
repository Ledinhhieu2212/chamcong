<?php

namespace Database\Seeders;

use App\Models\calendar;
use App\Models\User;
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
            "day" => 'Thứ 2',
        ]);
        DB::table('calendars')->insert([
            "day" => "Thứ 3",
        ]);
        DB::table('calendars')->insert([
            "day" => "Thứ 4",
        ]);
        DB::table('calendars')->insert([
            "day" => "Thứ 5",
        ]);
        DB::table('calendars')->insert([
            "day" => "Thứ 6",
        ]);
        DB::table('calendars')->insert([
            "day" => "Thứ 7",
        ]);
        DB::table('calendars')->insert([
            "day" => "Chủ nhật",
        ]);

    }
}
