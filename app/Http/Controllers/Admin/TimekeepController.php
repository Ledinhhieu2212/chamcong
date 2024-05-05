<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\timekeep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimekeepController extends Controller
{
    public function index(Request $request)
    {
        $title = "Quản lý chấm công";
        return view('admin.timekeep.index', compact('title'));
    }
}
