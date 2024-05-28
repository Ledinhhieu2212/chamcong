<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Qrcode\Create;
use App\Models\Detail_QrCode;
use App\Models\Qrcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class QrcodeController extends Controller
{
    protected $model;

    public function __construct(Qrcode $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $title = "Quản lý qrcode";
        $qrcodes = $this->model::orderBy("created_at", "desc")->paginate(5);
        return view('admin.qrcode.index ', compact('title', 'qrcodes'));
    }
    public function create()
    {
        $title  = "Tạo mã QR chấm công mới";
        $users = User::orderBy('created_at')->get();
        return view('admin.qrcode.add', compact('title', 'users'));
    }

    public function store(Create $request)
    {
        $messages = [
            'name.required' => "Không có tên nhóm",
            'address.required' => "Không có địa chỉ",
        ];
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ], $messages);
        $this->model->name = $request->name;
        $this->model->mode = $request->mode;
        $this->model->address = $request->address;
        $this->model->address_latitude = $request->address_latitude;
        $this->model->address_longitude = $request->address_longitude;
        $this->model->save();
        $id = $this->model->id;
        foreach ($request->input('users') as $userid) {
            $user = User::find($userid);
            $user->qrcodes()->attach($id);
        };
        $this->model->qr_code = $id . "-" . time();
        $this->model->update();
        return  redirect()->route('admin.qrcode.index')->with('success', 'Tạo mới thành công');
    }

    public function show($id)
    {
        $title = "Sửa nhóm";
        $qrcode = $this->model->find($id);
        $users =  User::all();
        return view('admin.qrcode.edit', compact('qrcode', 'title', 'users'));
    }

    public function update(Request $request, $id)
    {
        $qrcode = $this->model::find($id);
        $qrcode->update([
            'name' => $request->input('name'),
            'mode' => $request->input('mode'),
            'address' => $request->input('address'),
            'address_latitude' => $request->input('address_latitude'),
            'address_longitude' => $request->input('address_longitude'),
            'updated_at' => now(),
        ]);
        $qrcode->users()->detach();
        $qrcode->users()->attach($request->input('users'));
        return  redirect()->route('admin.qrcode.index')->with('success', 'Sửa thành công');
    }

    public function destroy(string $id)
    {
        $qrcode = $this->model::findOrFail($id);
        $qrcode->users()->detach($id);
        $qrcode->delete();
        return  redirect()->route('admin.qrcode.index')->with('success', 'Xóa thành công');
    }
}
