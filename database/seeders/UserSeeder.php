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
            'id' =>1,
            'username' => 'ledinhhieu',
            'fullname' => 'Lê Đình Hiếu',
            'email' => 'dinhhieu@gmail.com',
            'password' => Hash::make('password'),
            'position_id' => 1,
            'image' => 'https://danviet.mediacdn.vn/thumb_w/550/upload/2-2019/images/2019-04-02/dan-truong-1-1554201405-width600height796.jpg',
            'remember_token' => Str::random(10),
        ]);


    }
}
