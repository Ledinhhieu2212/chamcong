<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail_QrCode;
use App\Models\Qrcode;
use App\Models\User;
use DeflateContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class QrcodeController extends Controller
{
    public function __construct()
    {
        View::share('qrcodes', Qrcode::all());
    }

    public function index()
    {
        return view("admin.qrcode.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $ids = $request->ids;
        $qrcode =  Qrcode::create($data);
        foreach ($ids as $id) {
            Detail_QrCode::create([
                "user_id" => $id,
                "qrcode_id" => $qrcode->id,
            ]);
        }

        return redirect()->route('admin.qrcode.create');
    }
    public function edit(int $id)
    {
        $qrcode_edit = Qrcode::find($id);
        return view('admin.qrcode.edit', compact('qrcode_edit'));
    }
    public function update(Request $request, int $id)
    {

        $data = $request->all();
        $ids = $request->ids;
        $qrcode = Qrcode::find($id);
        $qrcode->detail_qrcodes()->delete();
        if ($ids !== null) {
        foreach ($ids as $id) {
            Detail_QrCode::create([
                "user_id" => $id,
                "qrcode_id" => $qrcode->id,
            ]);
        }}else{
            Detail_QrCode::create([
                "user_id" => null,
                "qrcode_id" => $qrcode->id,
            ]);
        }

        return redirect()->route('admin.qrcode.create');
    }

    public function delete(int $id)
    {
        $qrcode = Qrcode::find($id);
        $qrcode->detail_qrcodes->each(function ($detailQrcode) {
            $detailQrcode->delete();
        });
        $qrcode->delete();
        return redirect()->route('admin.qrcode.create')->with('success', 'Xóa thành công nhân viên');
    }
}
