<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'username' => 'ledinhhieu',
            'fullname' => 'Lê Đình Hiếu',
            'email' => 'dinhhieu@gmail.com',
            'password' => Hash::make('password'),
            'position_id' => 1,
            'image' => 'dan-truong-hai-mai.jpg',
            'remember_token' => Str::random(10),
        ]);


        User::factory()
            ->count(15)
            ->create();
    }
}
