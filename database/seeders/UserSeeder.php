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
            $name = 'username' => 'nhanviena',
            'fullname' => 'Nhân viên A',
            $mail = 'email' => 'nva@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://toigingiuvedep.vn/wp-content/uploads/2021/07/mau-anh-the-dep-lam-the-can-cuoc.jpg',
            'remember_token' => Str::random(10),
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            'username' => 'nhanvienb',
            'fullname' => 'Nhân viên B',
            'email' => 'nvb@gmail.com',
            'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://th.bing.com/th/id/OIP.zDpkbSxWJKF9vp9HB0zkSgHaLH?pid=ImgDet&w=474&h=711&rs=1',
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienc',
            'fullname' => 'Nhân viên C',
            $mail = 'email' => 'nvc@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://th.bing.com/th/id/OIP.IVCWB8veo7m_lwMfVXmVAQHaLH?pid=ImgDet&w=474&h=711&rs=1',
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanviend',
            'fullname' => 'Nhân viên D',
            $mail = 'email' => 'nvd@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://vnn-imgs-a1.vgcloud.vn/icdn.dantri.com.vn/2021/05/26/ngo-ngang-voi-ve-dep-cua-hot-girl-anh-the-chua-tron-18-docx-1622043349706.jpeg',
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanviene',
            'fullname' => 'Nhân viên E',
            $mail = 'email' => 'nve@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://toplist.vn/images/800px/anh-vien-piano-156190.jpg',
        ]);


        DB::table('users')->insert([
            'id' => Uuid::uuid4()->toString(),
            $name = 'username' => 'nhanvienf',
            'fullname' => 'Nhân viên F',
            $mail = 'email' => 'nvf@gmail.com',
            $pass = 'password' => Hash::make('123456'),
            'position_id' => Position::inRandomOrder()->value('id'),
            'image' => 'https://3.bp.blogspot.com/-ckaz8OGT99Q/WrJ4BOLtQkI/AAAAAAAAA24/vZaL--YusZEK_C117-S7PQXhW1Ri-myHgCEwYBhgL/s1600/cach%2Bchup%2Banh%2Bthe%2Bdep%2B2.jpg',
        ]);
    }
}
