<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

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
            'phone' =>'0374078020',
            'cccd' =>'037407802031',
            'address' => 'Xuân Canh, Đông Anh, Hà Nội',
            'sex' => 1,
            'birthday' => '2002-12-22',
            'image' => 'https://i1-ngoisao.vnecdn.net/2019/04/20/dan-truonbg-1555726586-6999-1555727229.png?w=1020&h=0&q=100&dpr=1&fit=crop&s=GGofH-dNiOamWWnXenGN9g',
            'qrcode' => Hash::make("ledinhhieu;dinhhieu203765@gmail.com;".Hash::make('password')),
            'status' => true,
        ]);
        $this->call([
            UserSeeder::class,
        ]);
    }
}
