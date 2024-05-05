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
    /**
     * Display a listing of the resource.
     */
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
        $users = User::doesntHave('qrcodes')->orderBy('created_at')->get();
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
        $this->model->save();
        $id = $this->model->id;
        $this->model->qr_code = Hash::make($id);
        $path = 'assets/img/qrcode/';
        $file_path = time() . '.png';
        $this->model->image = $file_path;
        foreach ($request->input('users') as $userid) {
            $user = User::find($userid);
            $user->qrcodes()->attach($id);
        };
        $image = FacadesQrCode::format('png')
            ->size(200)->errorCorrection('H')
            ->generate($this->model->qr_code, $path . $file_path);
        $this->model->update();
        return  redirect()->route('admin.qrcode.index')->with('success', 'Tạo mới thành công');
    }
    
    public function show($id)
    {
        $title = "Sửa nhóm";
        $qrcode = $this->model->find($id);
        $users =  User::whereHas('qrcodes', function ($q) use ($id) {
            $q->where('qrcode_id', '=', $id);
        })->get();
        return view('admin.qrcode.edit', compact('qrcode', 'title', 'users'));
    }

    public function update(Request $request, $id)
    {
        $qrcode = $this->model::find($id);
        $qrcode->update([
            'name' => $request->input('name'),
            'mode' => $request->input('mode'),
            'address' => $request->input('address'),
        ]);
        $qrcode->users()->detach();
        $qrcode->users()->attach($request->input('users'));
        return  redirect()->route('admin.qrcode.index')->with('success', 'Sửa thành công');
    }

    public function destroy(string $id)
    {
        $qrcode = $this->model::findOrFail($id);
        $path = 'assets/img/qrcode/';
        $qrcode->users()->detach($id);
        $image = $qrcode->image;
        if (File::exists($path . $image)) {
            File::delete($path . $image);
        }
        $qrcode->delete();
        return  redirect()->route('admin.qrcode.index')->with('success', 'Xóa thành công');
    }
}
