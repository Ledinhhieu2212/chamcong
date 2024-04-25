<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            "id" => Uuid::uuid4()->toString(),
            "name" => "Quản lý",
        ]);
        DB::table('permissions')->insert([
            "id" => Uuid::uuid4()->toString(),
            "name" => "Nhân viên",
        ]);
    }
}
