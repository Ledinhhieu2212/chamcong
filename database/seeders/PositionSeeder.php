<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            "job" => "Pha chế",
        ]);

        DB::table('positions')->insert([
            "job" => "Tính hóa đơn",
        ]);

        DB::table('positions')->insert([
            "job" => "Phục vụ",
        ]);

        DB::table('positions')->insert([
            'id' => 999,
            "job" => "Quản lý",
        ]);

    }
}
