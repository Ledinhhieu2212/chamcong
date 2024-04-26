<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [   'id' => Uuid::uuid4()->toString(),
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'remember_token' => Uuid::uuid4()->toString(),
            ]
        ]);
    }
}
