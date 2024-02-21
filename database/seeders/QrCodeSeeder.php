<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("qrcodes")->insert([
            'name' => 'nhóm 1',
            'address_address' =>'Hà Nội'
        ]);

        DB::table("qrcodes")->insert([
            'name' => 'nhóm 2',
            'address_address' =>'1321311dfsffewf'
        ]);

        DB::table("qrcodes")->insert([
            'name' => 'nhóm 3',
            'address_address' =>'13213123131'
        ]);

        DB::table("qrcodes")->insert([
            'name' => 'nhóm 4',
            'address_address' =>'123213'
        ]);
        
        DB::table("detail_qrcodes")->insert([
            'user_id' => 1,
            'qrcode_id' => 2
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 1,
            'qrcode_id' => 1
        ]);


        DB::table("detail_qrcodes")->insert([
            'user_id' => 2,
            'qrcode_id' => 1
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 3,
            'qrcode_id' => 1
        ]);
    }
}
