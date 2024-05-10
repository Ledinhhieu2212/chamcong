<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\timekeep;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index()
    {
        $title = "Quản lí báo cáo";
        $users = User::all();
        $users_timekeeps = timekeep::with('calendar_user')->get();
        dd($users_timekeeps);
        return view("admin.report.index", compact("title"));
    }
}
