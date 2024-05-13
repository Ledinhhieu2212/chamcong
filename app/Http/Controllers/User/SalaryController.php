<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{

    public function index(Request $request)
    {
        $title = "Lương";
        $datas = $request->all();
        // dd($datas);
        $user = Auth::user();
        $salaries = Salary::where("user_id", $user->id);
        if ($datas != null) {
            $month = Carbon::parse($datas["date_month"])->month;
            $year = Carbon::parse($datas["date_month"])->year;
            $salaries = $salaries->where("month", $month)->where("year", $year);
        }
        $salaries = $salaries->orderByDesc("month")->get();
        return view("user.statistic.index", compact("title", 'salaries'));
    }
}
