<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Detail_CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('detail_calendars')->insert([
            'id' => 1,
            'user_id' => 1,
            'calendar_id'=> 1,
            'is_registered' => 1,
        ]);

        DB::table('detail_calendars')->insert([
            'user_id' => 1,
            'calendar_id'=> 2,
            'is_registered' => 1,
        ]);

        DB::table('detail_calendars')->insert([
            'user_id' => 1,
            'calendar_id'=> 3,
            'is_registered' => 1,
        ]);

        DB::table('detail_calendars')->insert([
            'user_id' => 1,
            'calendar_id'=> 4,
            'is_registered' => 0,
        ]);

    }
}
