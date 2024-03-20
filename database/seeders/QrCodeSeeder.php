<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("qrcodes")->insert([
            $id = 'id' => 1,
            $name = 'name' => 'nhóm 1',
            $mode = 'mode' => 1,
            $address = 'address_address' => 'Hà Nội',
            'qr_code' => Hash::make("?id=$id?name=$name?mode=$mode?address=$address?"),
        ]);

        DB::table("qrcodes")->insert([
            $id = 'id' => 2,
            $name = 'name' => 'Nhóm 2',
            $mode = 'mode' => 1,
            $address = 'address_address' => 'Hải Phòng',
            'qr_code' => Hash::make("?id=$id?name=$name?mode=$mode?address=$address?"),
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 1,
            'qrcode_id' => 1,
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 2,
            'qrcode_id' => 1,
        ]);


        DB::table("detail_qrcodes")->insert([
            'user_id' => 3,
            'qrcode_id' => 1,
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 4,
            'qrcode_id' => 2,
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 5,
            'qrcode_id' => 2,
        ]);

        DB::table("detail_qrcodes")->insert([
            'user_id' => 6,
            'qrcode_id' => 2,
        ]);
    }
}
