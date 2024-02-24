<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * 1 = sáng
     * 2 = chiều
     * 3 = đêm
     */
    public function run(): void
    {
        DB::table('shifts')->insert([
            'day_work_id' => 1,
            'type_shifts'=> 1,
        ]);

        DB::table('shifts')->insert([
            'day_work_id' => 1,
            'type_shifts'=> 2,
        ]);

        DB::table('shifts')->insert([
            'day_work_id' => 4,
            'type_shifts'=> 1,
        ]);

        DB::table('shifts')->insert([
            'day_work_id' => 4,
            'type_shifts'=> 2,
        ]);
        DB::table('shifts')->insert([
            'day_work_id' => 6,
            'type_shifts'=> 1,
        ]);
        DB::table('shifts')->insert([
            'day_work_id' => 5,
            'type_shifts'=> 3,
        ]);
    }
}
