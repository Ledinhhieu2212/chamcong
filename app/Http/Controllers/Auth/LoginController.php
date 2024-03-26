<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Detail_QrCode;
use App\Models\Qrcode;
use App\Models\timekeep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->position_id == 999) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        }
        return view('auth.login');
    }
    public function loginPost(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->position_id == 999) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        }
        return redirect()->route('login')->with('error', 'Email/Username hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    public function scanner(Request $request)
    {
        return view('auth.QrCodeLogin');
    }

    public function scannerPost(Request $request)
    {
        $data = $request->all();
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $qrcode = QrCode::where('qr_code', $data['qrcode'])->first();

            if ($qrcode) {
                $detail_qrcode = Detail_QrCode::where('user_id', $user->id)->where('qrcode_id', $qrcode->id)->first();
                if ($detail_qrcode) {
                    if ($user->position_id !== 999) {
                        if (!timekeep::where('user_id', $user->id)->where('day_timekeep', now()->startOfDay())->first()) {
                            timekeep::create([
                                'user_id' =>  $user->id,
                                'day_timekeep' => now()->startOfDay(),
                            ]);
                        }

                        if ($request->input('time_work') == "in") {
                            DB::table('timekeeps')->where('user_id', $user->id)->where('day_timekeep', Carbon::now()->startOfDay())->update(['time_in' => Carbon::now()->toTimeString()]);

                        } else if ($request->input("time_work") == "out") {
                            DB::table('timekeeps')->where('user_id', $user->id)->where('day_timekeep',  Carbon::now()->startOfDay())->update(['time_out' => Carbon::now()->toTimeString()]);
                        }

                        // if()

                        return redirect()->route('scanner')->with('cussecc', "Chấm công thành công");
                    } else {
                        $this->logout($request);
                    }
                }
            } else {
                $this->logout($request);
            }
        }
        return redirect()->route('scanner')->with('error', 'Xác nhận không đúng');
    }
}
