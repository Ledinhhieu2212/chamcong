<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
        $title = "Quản lý lương";
        $users = User::all();
        if($users){
            foreach ($users as $user) {
                $salary = Salary::create([
                    'user_id' => $user->id,
                    
                ]);
                #
            }
        }
        return view("admin.salary.index", compact("title"));
    }
}
