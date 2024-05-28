<?php

namespace Database\Seeders;

use App\Models\Position;
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
        Position::query()->delete();
        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Pha chế",
            'price' => 25000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Thu ngân",
            'price' => 20000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('positions')->insert([
            'id' => Uuid::uuid4()->toString(),
            "job" => "Phục vụ",
            'price' => 15000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
