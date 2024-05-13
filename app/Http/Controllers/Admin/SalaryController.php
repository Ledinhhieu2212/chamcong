<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
        $title = "Quản lý lương";
        $users = User::orderBy("fullname")->paginate(5);
        return view("admin.salary.index", compact("title", "users"));
    }

    public function create(){
        $title = "";

    }

    public function show($id, Request $request){
        $title = "Sửa thưởng nhân viên";
        $user = User::find($id);
        $salaryyy = $user->salaries()->first();
        if($request->input("month")){
            $salaryyy = Salary::find($request->input("month"));
        }
        return view("admin.salary.edit", compact("title", "user", "salaryyy"));
    }
}
