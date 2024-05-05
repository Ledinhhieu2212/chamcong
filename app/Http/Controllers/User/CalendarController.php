<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Qrcode;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $title = "Hiển thị lịch làm";
        return view('user.calendar.show', compact('title'));
    }
    public function create()
    {
        $title = "Đăng ký lịch làm";
        $qrcodes = Qrcode::orderBy('created_at')->get();
        $calendar = Calendar::orderBy('created_at', "desc")->get();
        return view('user.calendar.register', compact('title', 'qrcodes', 'calendar'));
    }

    public function store(Request $request)
    {
        $datas = $request->all();

        $user = User::find(Auth::guard('web')->id());
        $qrcode = Qrcode::find($datas["qrcode_id"]);
        if ($qrcode->users()->count() >= 0 && $qrcode->users()->count() <= 5) {
            $user->qrcodes()->attach($datas["qrcode_id"]);
            return redirect()->route("user.calendar.register")->with("success", "Đăng ký thành công");
        } else {
            return redirect()->route("user.calendar.register")->with("error", "Nhóm địa chỉ đã đủ nhân viên");
        }
    }
}
