<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::query()->delete();
        DB::table('admins')->insert([
            [
                'id' => Uuid::uuid4()->toString(),
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0374078020',
                'image' => 'avatar-admin-1.jpg',
                'remember_token' => Uuid::uuid4()->toString(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
