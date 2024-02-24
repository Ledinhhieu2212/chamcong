<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Day_WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 2"
        ]);
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 3"
        ]);
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 4"
        ]);
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 5"
        ]);
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 6"
        ]);

        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Thứ 7"
        ]);
        DB::table('day_works')->insert([
            'detail_calendar_id' => 1,
            'date_day'=>"Chủ nhật"
        ]);
    }
}
