<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginQrCodeController extends Controller
{
    public function __construct( )
    {
        # code...
    }

    public function index(){
        return view("auth.qrcodeLogin");
    }

    public function login( Request $request ){

    }
}
