<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\calendar_users;
use App\Models\Qrcode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    protected $model;

    public function __construct(Calendar $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $title = "Quản lý ngày làm";
        $calendars = Calendar::orderBy("start_date", 'desc')->get();
        $start = Carbon::now()->startOfWeek()->format('Y-m-d H:i');
        $end = Carbon::now()->endOfWeek()->format('Y-m-d H:i');
        return view('admin.calendar.index', compact('title', 'calendars'));
    }

    public function create()
    {
        $title = "Tạo mới";
        $users = User::all();
        return view('admin.calendar.add', compact('title', 'users'));
    }

    public function store(Request $request)
    {
        if ($request->input('users') !== null) {
            $this->model->start_date = $request->input('start_date');
            $this->model->end_date = $request->input('end_date');
            $this->model->open_port = $request->input('open_port') ? 1 : 0;
            $this->model->save();
            $users = $request->input('users');
            $id = $this->model->id;
            $calendar = Calendar::find($id);
            $calendar->users()->attach($request->input('users'));
            return redirect()->route("admin.calendar.index")->with("success", "Đăng ký thành công");;
        } else {
            return redirect()->route("admin.calendar.create")->with("error", "Bạn chưa chọn nhân viên");
        }
    }

    public function show($id)
    {
        $title = "Sửa lịch";
        $users = User::all();
        $calendar = $this->model::find($id);
        return view('admin.calendar.edit', compact('title', 'users', 'calendar'));
    }

    public function update(Request $request, $id)
    {
        $calendar = $this->model::find($id);
        $calendar->update([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'open_port' => $request->input('open_port') ? 1 : 0,
            'updated_at' => now(),
        ]);
        $calendar->users()->detach();
        $calendar->users()->attach($request->input('users'));
        return  redirect()->route('admin.calendar.index')->with('success', 'Sửa thành công');
    }

    public function destroy(string $id)
    {
        $calendar = $this->model::find($id);
        $calendar->users()->detach($id);
        $calendar->calendar_users()->detach();
        $calendar->delete();
        return  redirect()->route('admin.calendar.index')->with('success', 'Xóa thành công');
    }
}
