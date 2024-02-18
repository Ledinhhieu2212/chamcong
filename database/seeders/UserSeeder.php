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
            'phone' => '0374078020',
            'cccd' => '037407802031',
            'address' => 'Xuân Canh, Đông Anh, Hà Nội',
            'sex' => 1,
            'birthday' => '2002-12-2',
            'image' => 'dan-truong-hai-mai.jpg',
            'qrcode' => "ledinhhieu;dinhhieu203765@gmail.com;" . Hash::make('password'),
            'status' => true,
            'remember_token' => Str::random(10),
        ]);


        User::factory()
            ->count(20)
            ->create();
    }
}
