<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
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
        $calendars = Calendar::orderBy("created_at", "desc")->get();
        $start = Carbon::now()->startOfWeek()->format('Y-m-d H:i');
        $end = Carbon::now()->endOfWeek()->format('Y-m-d H:i');
        return view('admin.calendar.index', compact('title', 'calendars'));
    }

    public function create()
    {
        $title = "Tạo mới";
        $users = User::all();
        $qrcodes = Qrcode::all();
        return view('admin.calendar.add', compact('title', 'users', 'qrcodes'));
    }

    public function store(Request $request)
    {
        $datas = $request->all();
        $this->model->create($datas);
        $id = $this->model->id;
        foreach ($request->input('users') as $userid) {
            $user = User::find($userid);
            $user->calendars()->attach($id);
        };
        return redirect()->route("admin.calendar.index")->with("success", "Đăng ký thành công");;
    }

    public function show($id)
    {
        $title = "Sửa nhóm";

        $calendars = Qrcode::all();
        return view('admin.calendar.edit', compact('title'));
    }

    public function update(Request $request, $id)
    {
        $qrcode = $this->model::find($id);
        $qrcode->update([
            'job' => $request->input('name'),
        ]);
        return  redirect()->route('admin.calendar.index')->with('success', 'Sửa thành công');
    }

    public function destroy(string $id)
    {
        $calendar = $this->model::find( $id );
        $calendar->users()->detach($id);
        $calendar->delete();
        return  redirect()->route('admin.calendar.index')->with('success', 'Xóa thành công');
    }
}
