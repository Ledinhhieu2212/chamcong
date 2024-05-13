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
    public $rounds = [];

    // public function __construct($user_id, $roundid = null, $start = "2000-01-01", $end = "2030-01-01", $courseid = 0)
    // {
    //     $this->rounds = ;
    // }
    public function index()
    {
        $title = "Thống kê nhân viên làm việc";
        $users = User::orderBy('fullname')->get();
        $chartData = collect();
        foreach ($users as $user) {
            $chartData[] = [
                'name' => $user->fullname,
                'count_timekeep' => $user->detail_timekeeps->where('user_id', $user->id)->where("status", "!=", 4)->where("status", "!=", 5)->where("status", "!=", 6)->count(),
                'count_timekeep2' => $user->detail_timekeeps->where('user_id', $user->id)->where("status", "!=", 1)->where("status", "!=", 2)->where("status", "!=", 3)->count(),
            ];
        }
        $datas= [
            'chartData' => $chartData,
        ];
        // foreach ($datas['chartData'] as $data) {
        //     echo $data['name'] . "<br>";
        // }
        return view("admin.report.index", compact("title", "datas"));
    }
}
