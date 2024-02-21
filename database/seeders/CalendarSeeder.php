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
            "day" => 1,
            "user_id"=> 1,
            'morning' => false,
            'afternoon' => true,
            'night' => false,
        ]);
        DB::table('calendars')->insert([
            "day" => 2,
            "user_id"=> 1,
            'morning' => true,
            'afternoon' => false,
            'night' => true,
        ]);
        DB::table('calendars')->insert([
            "day" => 3,
            "user_id"=> 1,
            'morning' => true,
            'afternoon' => false,
            'night' => true,
        ]);
        DB::table('calendars')->insert([
            "day" => 4,
            "user_id"=> 1,
            'morning' => false,
            'afternoon' => true,
            'night' => true,
        ]);
        DB::table('calendars')->insert([
            "day" => 5,
            "user_id"=> 1,
            'morning' => true,
            'afternoon' => false,
            'night' => true,
        ]);
        DB::table('calendars')->insert([
            "day" => 6,
            "user_id"=> 1,
            'morning' => true,
            'afternoon' => false,
            'night' => false,
        ]);
        DB::table('calendars')->insert([
            "day" => 7,
            "user_id"=> 1,
            'morning' => false,
            'afternoon' => false,
            'night' => true,
        ]);

    }
}
