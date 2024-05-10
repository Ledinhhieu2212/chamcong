<?php

namespace Database\Seeders;

use App\Models\Qrcode;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Qrcode::query()->delete();
        $qrcode1 = Qrcode::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Nhóm 1',
            'mode' => 1,
            'address' => '9 P. Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội 123186, Việt Nam',
            'address_latitude' => '21.030524606379085',
            'address_longitude' => '105.78483564417787',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);
        $qrcode1->qr_code = $qrcode1->id . "-" . time();
        $qrcode1->update();

        $qrcode2 = Qrcode::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Nhóm 2',
            'mode' => 2,
            'address' => '9 P. Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội 123186, Việt Nam',
            'address_latitude' => '21.030524606379085',
            'address_longitude' => '105.78483564417787',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $qrcode2->qr_code = $qrcode2->id . "-" . time();
        $qrcode2->update();

        $qrcode3 = Qrcode::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Home Lê Đình Hiếu',
            'mode' => 1,
            'address' => 'Xuân Canh, Đông Anh, Hà Nội, Việt Nam',
            'address_latitude' => '21.081767575713158',
            'address_longitude' => '105.8480810338313',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $qrcode3->qr_code = $qrcode3->id . "-" . time();
        $qrcode3->update();

        $qrcode4 = Qrcode::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'HNMU',
            'mode' => 2,
            'address' => '98 phố Dương Quảng Hàm, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam',
            'address_latitude' => '21.035897149733465',
            'address_longitude'=> '105.80132789558647',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $qrcode4->qr_code = $qrcode4->id . "-" . time();
        $qrcode4->update();

        $users = User::all();
        foreach ($users as $user) {
            $qrcode1->users()->attach($user->id);
            $qrcode2->users()->attach($user->id);
            $qrcode3->users()->attach($user->id);
            $qrcode4->users()->attach($user->id);
        }
    }
}
