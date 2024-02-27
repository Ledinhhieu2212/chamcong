<?php

namespace App\Http\Controllers\User\Calendars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day_Works;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $day = [
            'Thứ 2', "Thứ 3", "Thứ 4",
            'Thứ 5', "Thứ 6", "Thứ 7", "Chủ nhật"
        ];
        $calendars = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $calendar_end = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();

        $schedules = DB::table('detail_calendars')
            ->join('schedules', 'detail_calendars.id', '=', 'schedules.detail_calendar_id')
            ->select('detail_calendars.*', 'schedules.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->get();
        return view('user.calendar.show.index', compact('calendars', 'calendar_end', 'day', 'schedules'));
    }

    public function search(Request $request, int $id)
    {
        $calendars = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $calendar_end = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();
        return redirect()->route("calendar")->with("success", "");
    }
}
