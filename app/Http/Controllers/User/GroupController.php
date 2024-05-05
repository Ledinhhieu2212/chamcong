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
        $user = User::find(Auth::guard("web")->id());
        $qrcodes = $user->qrcodes()->paginate(10);
        return view("user.group.index", compact("title",'qrcodes'));
    }
}
