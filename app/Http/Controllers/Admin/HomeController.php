<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Position;
use App\Models\Qrcode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Trang chủ";
        $position = Position::count();
        $usercount = User::all()->count();
        $qrcode = Qrcode::count();
        $calendar = Calendar::count();
        $datas = [
            'position' => $position,
            'usercount' => $usercount,
            'qrcode' => $qrcode,
            'calendar' => $calendar,
        ];
        return view('admin.home.index', compact('title', 'datas'));
    }
}
