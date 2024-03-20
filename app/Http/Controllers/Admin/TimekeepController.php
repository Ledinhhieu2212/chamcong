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

        $title = "Quản lý chấm công nhân viên";
        $timekeeps = timekeep::with('user:id,image');
        // dd($request->month);
        if ($request->input('day')) {
            $formattedDay = str_pad($request->input('day'), 2, '0', STR_PAD_LEFT);
            $timekeeps =  $timekeeps->where('date', 'like', '%-' . $formattedDay . '%');
        }
        if ($request->input('month')) {
            $formattedMonth = str_pad($request->input('month'), 2, '0', STR_PAD_LEFT);
            $timekeeps =  $timekeeps->where('date', 'like', '%-' . $formattedMonth . '-%');
        }
        if ($request->input('year')) {
            $timekeeps =  $timekeeps->where('date', 'like', $request->input('year') . '%');
        }
        $timekeeps = $timekeeps->get();
        $data = [
            'title' => $title,
            'timekeeps' => $timekeeps
        ];
        return view('admin.timekeep.index', compact('data'));
    }
}
