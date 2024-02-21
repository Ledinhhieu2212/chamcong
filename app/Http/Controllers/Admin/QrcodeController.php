<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qrcode;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    public function index(){
        $qrcodes = Qrcode::all();
        return view("admin.qrcode.index", compact("qrcodes"));
    }
    public function post(){
        $qrcodes = Qrcode::all();
        return view("admin.qrcode.index", compact("qrcodes"));
    }
}
