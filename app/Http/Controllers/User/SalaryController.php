<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{

    public function index(){
        $title ="Lương";

        $calendars = Auth::user()->calendars;
        // dd($salary);
        // $status_timekeep = ;
        return view("user.statistic.index", compact("title"));
    }
}
