<?php

namespace App\Http\Controllers\User\Calendars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day_Works;
use App\Models\Detail_Calendar;
use App\Models\Schedule;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        $day = [
            'Thứ 2', "Thứ 3", "Thứ 4",
            'Thứ 5', "Thứ 6", "Thứ 7", "Chủ nhật"
        ];
        $calendar = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*', 'detail_calendars.is_registered as is_registered')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();
        return view('user.calendar.register.index', compact('calendar', 'day'));
    }

    public function store(Request $request)
    {
        $datas = $request->all();
        // dd($datas);
        $shifts_1 = $request->input("shift_1", []);
        $shifts1 = $request->input("shift1", []);

        $shifts_2 = $request->input("shift_2", []);
        $shifts2 = $request->input("shift2", []);

        $shifts_3 = $request->input("shift_3", []);
        $shifts3 = $request->input("shift3", []);

        foreach ($shifts1 as $key => $value) {
            if (array_key_exists($key, $shifts_1) && $shifts_1[$key] === "1") {
                $shifts1[$key] = $shifts_1[$key];
            }
        }
        foreach ($shifts2 as $key => $value) {
            if (array_key_exists($key, $shifts_2) && $shifts_2[$key] === "1") {
                $shifts2[$key] = $shifts_2[$key];
            }
        }
        foreach ($shifts3 as $key => $value) {
            if (array_key_exists($key, $shifts_3) && $shifts_3[$key] === "1") {
                $shifts3[$key] = $shifts_3[$key];
            }
        }
        // Kiểm tra xem người dùng đã đăng ký lịch làm chưa

        $calendar = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('detail_calendars.id')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();
        for ($i = 1; $i <= 6; $i++) {
            Schedule::create(
                [
                    "day" => $i,
                    'detail_calendar_id' => $calendar->id,
                    'shift_1' => $shifts1[$i],
                    'shift_2'  => $shifts2[$i],
                    'shift_3' => $shifts3[$i],
                ]
            );
        }

        $detail_calendar = Detail_Calendar::find($calendar->id);
        $detail_calendar->update([
            'is_registered' => 1,
        ]);
        return redirect()->route("register.calendar")->with("success", "");
    }
}
