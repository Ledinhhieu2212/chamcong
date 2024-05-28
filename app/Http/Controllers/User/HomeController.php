<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // view()->share("user_account", Auth::user());
    }
    public function index()
    {
        $user = Auth::guard('web')->user();
        $title = "Trang chủ";
        $position =$user->position_id;
        $usercount = $user->username;
        $qrcode = $user->qrcodes->count();
        $calendar = $user->calendars->count();
        $datas = [
            'position' => $position,
            'usercount' => $usercount,
            'qrcode' => $qrcode,
            'calendar' => $calendar,
        ];
        return view('user.home.index' ,compact('title', 'datas'));
    }
}
