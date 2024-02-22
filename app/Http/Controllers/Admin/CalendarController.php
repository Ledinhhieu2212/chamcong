<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Detail_Calendar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CalendarController extends Controller
{
    public function __construct()
    {
        View::share('calendars', Calendar::all());
    }
    public function index()
    {
        return view('admin.calendar.add');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $ids = $request->ids;
        $calendar =  Calendar::create($data);
        if ($ids !== null) {
            foreach ($ids as $id) {
                Detail_Calendar::create([
                    "user_id" => $id,
                    "calendar_id" => $calendar->id,
                ]);
            }
        } else {
            Detail_Calendar::create([
                "user_id" => null,
                'calendar_id' => $calendar->id,
            ]);
        }
        return redirect()->route('admin.calendar');
    }
    public function edit(int $id)
    {
        $calendar_edit = Calendar::find($id);
        return view('admin.calendar.edit', compact('calendar_edit'));
    }
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $ids = $request->ids;
        $calendar = Calendar::find($id);
        $calendar->detail_calendars()->delete();
        if ($ids !== null) {
            foreach ($ids as $id) {
                Detail_Calendar::create([
                    "user_id" => $id,
                    "calendar_id" => $calendar->id,
                ]);
            }
        } else {
            Detail_Calendar::create([
                "user_id" => null,
                'calendar_id' => $calendar->id,
            ]);
        }
        $calendar->update($data);
        return redirect()->route('admin.calendar');
    }

    public function delete(int $id)
    {
        $calendar = Calendar::find($id);
        $calendar->detail_calendars->each(function ($detailCalendar) {
            $detailCalendar->delete();
        });
        $calendar->delete();
        return redirect()->route('admin.calendar')->with('success', 'Xóa thành công nhân viên');
    }
}
