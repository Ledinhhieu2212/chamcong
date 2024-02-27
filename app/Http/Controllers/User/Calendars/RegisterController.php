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
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();
        return view('user.calendar.register.index', compact('calendar', 'day'));
    }

    public function store(Request $request)
    {
        $datas = $request->all();
        dd($datas);
        $schedules = DB::table('detail_calendars')
            ->join('schedules', 'detail_calendars.id', '=', 'schedules.detail_calendar_id')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->value('detail_calendars.calendar_id');

        $detailCalendar = Detail_Calendar::where('user_id', auth()->user()->id)
            ->where('calendar_id', $schedules)
            ->first();
        if ($detailCalendar) {
            // foreach($datas as $data){
            //     $schedule = new Schedule([
            //     ]);
            // }

            // $schedule->save();
        }
        return redirect()->route("register.calendar")->with("success", "");
    }
}
