<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\calendar_users;
use App\Models\detail_timekeep;
use App\Models\Qrcode;
use App\Models\Schedule;
use App\Models\timekeep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Time;

class TimekeepController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $timekeeps = $user->calendar_users->flatMap->timekeeps->sortByDesc('date');


        $title = "Thông tin chấm công nhân viên";
        return view('user.timekeep.index', compact('title', 'timekeeps'));
    }

    public function scanner()
    {
        $title = "Chấm công mã qrcode";

        return view('user.timekeep.qrcode', compact('title'));
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();
        $datas = $request->all();
        //Danh sách nhóm qrcode
        $groups = $user->qrcodes;
        $calendars = $user->calendars;
        $calendar_first = $calendars->first();
        $calendar_user = $user->calendar_users;
        $calendarUser = $user->calendar_users->first();
        // Tìm kiếm thời khóa biểu chấm công hôm nay (đã có calendar_user first)
        $today = Carbon::today()->dayOfWeek;
        // Tìm ca đẫ chọn ngày hôm
        $timekeeps_now = timekeep::whereDate('date', Carbon::today()->toDateString())->first();
        // Tìm lịch làm ngày hôm nay
        $shedule = Schedule::where("calendar_user_id", $calendarUser->id)->where("day", $today)->first();
        // Tìm địa chỉ của qrcode
        $qr_code = $groups->where('qr_code', $request->input('qrcode'))->first();
        if ($qr_code == null) {
            return redirect()->route('user.timekeep.scanner')->with('error', 'Đã nhập sai mã QR code hoặc không nhập, xin thử lại');
        }

        // Kiểm tra xem có chấm công hôm nay chưa
        $timekeeps_now = timekeep::whereDate('date', Carbon::today()->toDateString());
        // Nếu chưa chấm công thì sẽ tạo chấm công
        if ($timekeeps_now == null) {
            $timekeep = timekeep::create([
                'calendar_user_id' => $calendar_user->first()->id,
                'date' => Carbon::now()->toDateTimeString(),
            ]);
            if ($datas["in_out"]) {
                $timekeep->update(["time_in" => Carbon::now()]);
            } else {
                $timekeep->update(["time_out" => Carbon::now()]);
            }
        } else {
            if ($datas["in_out"]) {
                $timekeeps_now->first()->update(["time_in" => Carbon::now()]);
            } else {
                $timekeeps_now->first()->update(["time_out" => Carbon::now()]);
            }
        }


        if ($shedule !== null) {
            // Kiểm tra ngày chấm công bằng ngày đăng ký
            if (Carbon::parse($timekeeps_now->date)->dayOfWeek == $shedule->day) {
                $timekeeps_now->update(["schedule_id" => $shedule->id]);
                $timekeep_time_in = detail_timekeep::where('timekeep_id', $timekeeps_now->id)->where('status', 2)->first();
                $timekeep_time_out = detail_timekeep::where('timekeep_id', $timekeeps_now->id)->where('status', 3)->first();
                // ca 1 chọn
                if ($shedule->shift_1) {
                    // ca 2 chọn
                    if ($shedule->shift_2) {
                        // ca 3 chọn
                        if ($shedule->shift_3) {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("07:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("21:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("07:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("21:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }
                        } else {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("07:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("17:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("07:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("17:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }
                        }
                    } else {

                        if ($shedule->shift_3) {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("07:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("21:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("07:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("21:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }
                        } else {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("07:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("11:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("07:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("11:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 4
                                ]);
                            }

                            if (Carbon::parse($timekeeps_now->time_in) == Carbon::parse("00:00:00") && Carbon::parse($timekeeps_now->time_out) == Carbon::parse("00:00:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 6
                                ]);
                            }
                        }
                    }
                } else {
                    // Bỏ chọn ca 1 và chọn 2 ca còn lại
                    if ($shedule->shift_2) {
                        // ca 3 chọn
                        if ($shedule->shift_3) {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("12:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("21:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("12:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("21:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }
                            if (Carbon::parse($timekeeps_now->time_in) == Carbon::parse("00:00:00") && Carbon::parse($timekeeps_now->time_out) == Carbon::parse("00:00:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 6
                                ]);
                            }
                            // Bỏ chọn ca 1, ca 3, chọn ca 2
                        } else {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("12:15:00")) {
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("17:45:00")) {
                                if ($timekeep_time_out == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 3
                                    ]);
                                }
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("12:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("17:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }
                            if (Carbon::parse($timekeeps_now->time_in) == Carbon::parse("00:00:00") && Carbon::parse($timekeeps_now->time_out) == Carbon::parse("00:00:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 6
                                ]);
                            }
                        }
                        // Bỏ chọn ca 1, ca 2
                    } else {

                        if ($shedule->shift_3) {
                            // Nếu Chấm công đến muộn
                            if (Carbon::parse($timekeeps_now->time_in) > Carbon::parse("17:15:00")) {
                                $timekeep_time_in = detail_timekeep::where('timekeep_id', $timekeeps_now->id)->where('status', 2)->first();
                                if ($timekeep_time_in == null) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeeps_now->id,
                                        'status' => 2
                                    ]);
                                }
                            }
                            // Nếu chấm công về sớm
                            if (Carbon::parse($timekeeps_now->time_out) < Carbon::parse("21:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 3
                                ]);
                            }
                            // Nếu chấm công đúng giờ
                            if (Carbon::parse($timekeeps_now->time_in) <= Carbon::parse("17:15:00") && Carbon::parse($timekeeps_now->time_out) >= Carbon::parse("21:45:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 1
                                ]);
                            }

                            if (Carbon::parse($timekeeps_now->time_in) == Carbon::parse("00:00:00") && Carbon::parse($timekeeps_now->time_out) == Carbon::parse("00:00:00")) {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 6
                                ]);
                            }
                        } else {
                            $timekeep_time_in_and_out = detail_timekeep::where('timekeep_id', $timekeeps_now->id)->where('status', 4)->first();
                            if (!$timekeep_time_in_and_out->exists()) {
                                // Bỏ chọn cả 3 ca thì sẽ thông báo lịch nghỉ
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeeps_now->id,
                                    'status' => 4
                                ]);
                                $timekeeps_now->update([
                                    'time_in' => Carbon::parse("00:00:00"),
                                    'time_out' => Carbon::parse("00:00:00")
                                ]);
                            }
                        }
                    }
                }
            }
        }


        return redirect()->route('user.timekeep.index')->with('success', 'Đã gửi đúng mã qr');
    }
}
