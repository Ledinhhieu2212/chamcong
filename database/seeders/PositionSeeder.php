<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Pha chế",
        ]);

        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Tính hóa đơn",
        ]);

        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Phục vụ",
        ]);
    }
}
