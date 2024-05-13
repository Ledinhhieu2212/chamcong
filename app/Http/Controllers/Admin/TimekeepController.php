<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\timekeep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TimekeepController extends Controller
{
    public function index(Request $request)
    {
        $title = "Quản lý chấm công";
        $users =  User::orderBy('fullname')->paginate(5);
        return view('admin.timekeep.index', compact('title', 'users'));
    }

    public function show($id)
    {
        $title = 'Sửa chấm công nhân viên';
        $user =  User::find($id);
        return view('admin.timekeep.edit', compact('title', 'user'));
    }
}
