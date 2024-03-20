<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\timekeep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimekeepController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $timekeeps = timekeep::where("user_id", $user->id)->orderBy("day_timekeep","desc");
        $data = [
            'title' => 'Thông tin chấm công nhân viên',
            "user"=> $user,
            'timekeeps' => $timekeeps,
        ];
        return view('user.timekeep.index', compact('data'));
    }
}
