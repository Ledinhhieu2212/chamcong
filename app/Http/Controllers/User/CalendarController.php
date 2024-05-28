<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\calendar_users;
use App\Models\Qrcode;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterfaces;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $datas = $request->all();
        $title = "Hiển thị lịch làm";
        //Request tìm kiếm
        $select_calendar_id = $request->input('datetime');
        $user = Auth::user();
        // Sắp xếp giảm dần
        $calendars = $user->calendars->sortByDesc('start_date');

        $calendar_first = $calendars->first();
        if ($calendar_first !== null) {
            // Nếu không tìm kiếm thì sẽ lấy giá trị thời khóa biểu đầu tiên
            if ($datas == null) {
                $schedules = Schedule::where('calendar_id', $calendar_first->id)->where('user_id', $user->id)->orderBy('day')->get();
            } else {
                // Nếu không sẽ lấy dữ liệu datetime
                $schedules = Schedule::where('calendar_id', $datas['datetime'])->where('user_id', $user->id)->orderBy('day')->get();
            }
            return view('user.calendar.show', compact('title', 'calendars', 'schedules', 'select_calendar_id'));
        } else {
            return view('user.calendar.unshow', compact('title'));
        }
    }

    public function create()
    {
        $title = "Đăng ký lịch làm"; // Tiêu đề
        // Tài khoản
        $user = Auth::user();
        // Danh sách thời khóa biểu trong tuần
        $calendars = $user->calendars;
        // Nếu không có danh sách thời khóa biểu => chưa có lịch;
        if ($calendars) {
            // TÌm kiểm thời khóa biểu cho phép đăng ký lịch
            $calendar_first = $calendars->where('start_date', '<=', Carbon::today())->where('end_date', '>=',  Carbon::today())->sortByDesc('start_date')->first();

            // dd($calendar_first);
            if ($calendar_first) {
                // Khi được đăng kí sẽ mở bảng khi không được sẽ hiện thông báo
                if ($calendar_first->open_port) {
                    $schedules = Schedule::where('calendar_id', $calendar_first->id)->where("user_id", $user->id)->exists();
                    if ($schedules) {
                        return view('user.calendar.registered', compact('title', 'calendar_first'));
                    } else {
                        return view('user.calendar.table', compact('title', 'calendar_first'));
                    }
                }
            } else {
                return view('user.calendar.derigister', compact('title'));
            }
        } else {
            return view('user.calendar.un_rigister', compact('title'));
        }
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $datas = $request->all();
        $calendars = $user->calendars;
        $calendar_first = $calendars->where('start_date', '<=', Carbon::today())->where('end_date', '>=',  Carbon::today())->sortByDesc('start_date')->first();
        $schedules = Schedule::where('calendar_id', $calendar_first->id)->where("user_id", $user->id);
        if ($schedules->exists()) {
            foreach ($schedules as $i => $schedule) {
                $schedule->where('day', $i)->update([
                    'shift_1' => $datas["day1s"][$i] ? 1 : 0,
                    'shift_2' => $datas["day2s"][$i] ? 1 : 0,
                    'shift_3' => $datas["day3s"][$i] ? 1 : 0,
                    'updated_at' => Carbon::now(),
                ]);
            }
        } else {
            for ($i = 0; $i < 7; $i++) {
                $sche = Schedule::create([
                    'calendar_id' => $calendar_first->id,
                    'user_id' =>  $user->id,
                    'day' => $i,
                    'shift_1' => $datas["day1s"][$i] ? 1 : 0,
                    'shift_2' => $datas["day2s"][$i] ? 1 : 0,
                    'shift_3' => $datas["day3s"][$i] ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('user.calendar.register')->with('success', 'Đăng ký thành công');
    }
}
