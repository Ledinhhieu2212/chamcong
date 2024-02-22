<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Detail_Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function index()
    {
        $data = [

            [

                "id" => 1,
                'day' => "Thứ 2",
            ],
            [

                "id" => 1,
                'day' => "Thứ 2",
            ],
            [
                "id" => 2,
                'day' => "Thứ 3",
            ],

            [
                "id" => 3,
                'day' => "Thứ 4",
            ],

            [
                "id" => 4,
                'day' => "Thứ 5",
            ],

            [
                "id" => 5,
                'day' => "Thứ 6",
            ],

            [
                "id" => 6,
                'day' => "Thứ 7",
            ],

            [
                "id" => 7,
                'day' => "Chủ nhật",
            ]
        ];
        $calendars = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('calendars.*')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('user.calendar.index', compact('calendars', 'data'));
    }
}
