<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $table->time('start_time')->nullable();
        // $table->time('end_time')->nullable();
        // $table->text('description')->nullable();
        DB::table('shifts')->insert([
            "start_time" =>  Carbon::parse('08:00:00'),
            "end_time" => Carbon::parse('12:00:00'),
            "description" => 'Ca sáng',
        ]);

        DB::table('shifts')->insert([
            "start_time" =>  Carbon::parse('13:00:00'),
            "end_time" => Carbon::parse('17:30:00'),
            "description" => 'Ca chiều',
        ]);

        DB::table('shifts')->insert([
            "start_time" =>  Carbon::parse('18:00:00'),
            "end_time" => Carbon::parse('22:00:00'),
            "description" => 'Ca tối',
        ]);

        DB::table('detail_shifts')->insert([
            "timekeep_id" =>  1,
            "shift_id" => 1,
        ]);


        DB::table('detail_shifts')->insert([
            "timekeep_id" =>  1,
            "shift_id" => 2,
        ]);

        DB::table('detail_shifts')->insert([
            "timekeep_id" =>  2,
            "shift_id" => 1,
        ]);

        DB::table('detail_shifts')->insert([
            "timekeep_id" =>  2,
            "shift_id" => 2,
        ]);

        DB::table('detail_shifts')->insert([
            "timekeep_id" =>  2,
            "shift_id" => 3,
        ]);
    }
}
