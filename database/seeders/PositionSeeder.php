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
            "job" => "NV bưng nước",
            "wage" => "10000",
        ]);

        DB::table('positions')->insert([
            "job" => "NV pha chế",
            "wage" => "20000",
        ]);


        DB::table('positions')->insert([
            "job" => "NV tính bill",
            "wage" => "20000",
        ]);


        DB::table('positions')->insert([
            "id" => 999,
            "job" => "Quản lý",
            "wage" => "150000",
        ]);
    }
}
