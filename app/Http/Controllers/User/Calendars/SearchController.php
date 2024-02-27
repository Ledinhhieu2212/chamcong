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
    public function index(Request $request)
    {
        $calendarId = $request->input('select_option');
        $day = [
            'Thứ 2', "Thứ 3", "Thứ 4",
            'Thứ 5', "Thứ 6", "Thứ 7", "Chủ nhật"
        ];
        $calendars = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*', 'detail_calendars.id as detail_calendar_id')
            ->where('detail_calendars.user_id', Auth::user()->id)
            ->orderByDesc('calendars.id')
            ->get();
        $calendar_end = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*', 'detail_calendars.id as detail_calendar_id')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->first();
        if ($request->input('select_option') == null) {
            $calendarId = $calendar_end->detail_calendar_id;
        }
        $calendar_search = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.is_calendar_enabled as calendar_enabled', 'detail_calendars.id as detail_id')
            ->where('detail_calendars.user_id', Auth::user()->id)
            ->where('detail_calendars.id', $calendarId)->first();
        // dd( $calendar_search);
        $schedules = DB::table('detail_calendars')
            ->join('schedules', 'detail_calendars.id', '=', 'schedules.detail_calendar_id')
            ->select('detail_calendars.*', 'schedules.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->where('detail_calendars.id', '=', $calendarId)
            ->get()->toArray();
        return view('user.calendar.show.table', compact('calendars', 'calendar_end', 'day', 'schedules', 'calendarId', 'calendar_search'));
    }
}
