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
            'name' => 'Lê Đình Hiếu',
            'mode' => 1,
            'address' => 'Xuân Canh, Đông Anh, Hà Nội',
            'address_latitude' => '21.214394',
            'address_longitude' => '105.746865',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $qrcode1->qr_code = $qrcode1->id . "-" . time();
        $qrcode1->update();

        $users = User::all();
        foreach ($users as $user) {
            $qrcode1->users()->attach($user->id);
        }
    }
}
