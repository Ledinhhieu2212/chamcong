<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            'username' => 'nhanviena',
            'fullname' => 'Nhân viên A',
            'email' => 'nva@gmail.com',
            'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-1.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            'username' => 'nhanvienb',
            'fullname' => 'Nhân viên B',
            'email' => 'nvb@gmail.com',
            'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-2.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienc',
            'fullname' => 'Nhân viên C',
            $mail = 'email' => 'nvc@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-3.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanviend',
            'fullname' => 'Nhân viên D',
            $mail = 'email' => 'nvd@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-4.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanviene',
            'fullname' => 'Nhân viên E',
            $mail = 'email' => 'nve@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-5.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienf',
            'fullname' => 'Nhân viên F',
            $mail = 'email' => 'nvf@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-6.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvieng',
            'fullname' => 'Nhân viên g',
            $mail = 'email' => 'nvg@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-7.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienh',
            'fullname' => 'Nhân viên h',
            $mail = 'email' => 'nvh@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-8.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvieni',
            'fullname' => 'Nhân viên I',
            $mail = 'email' => 'nvi@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-9.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienk',
            'fullname' => 'Nhân viên K',
            $mail = 'email' => 'nvk@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-10.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienl',
            'fullname' => 'Nhân viên L',
            $mail = 'email' => 'nvl@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'avatar-11.jpg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
