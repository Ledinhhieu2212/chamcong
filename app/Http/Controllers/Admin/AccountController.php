<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = Auth::guard('admins');
    }

    public function index()
    {
        $title = "Thông tin tài khoản";
        return view('admin.account.index', compact('title'));
    }


    public function edit()
    {
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = Admin::find($this->model->id());
        if ($request->hasFile('image')) {
            $path = 'assets/img/admin';
            $image = $request->file('image');
            $imageold = $user->image;
            $imageName = time() . '-avatar-admmin.' . $image->getClientOriginalExtension();
            if (File::exists($path . "/" . $imageold) && (($path . "/" . $imageold) !== 'avatar-admin-1.jpg')) {
                File::delete($path . "/" . $imageold);
            }
            $image->move($path, $imageName);
            $data['image'] = $imageName;
        }
        $data["updated_at"] = now();
        $data['password'] = Hash::make($request->password);
        $user->update( $data );
        return  redirect()->route('admin.account')->with('success', 'Cập nhật thành công thông tin tài khoản.');
    }
}
