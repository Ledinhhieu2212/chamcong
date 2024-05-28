<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
        $title = "Nhóm";
        $user = Auth::user();
        $qrcodes = $user->qrcodes;
        return view("user.group.index", compact("title",'qrcodes'));
    }
}
