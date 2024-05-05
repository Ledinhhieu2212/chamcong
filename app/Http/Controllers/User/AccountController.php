<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $model;


    public function index()
    {
        $this->model = Auth::guard('web')->user();

        $title = "Thông tin tài khoản " . $this->model->username;
        return view('user.account.index', compact('title'));
    }
}
