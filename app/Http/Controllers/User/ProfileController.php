<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function edit()
    {
        $positions = Position::all();
        $user = User::find(Auth::user()->id);
        $text = hash::make("?id=$user->id?fullname=$user->fullname?user=?$user->username?email=?$user->email?password=?$user->password?");
        $qrCode = QrCode::format('png')->size(500)->generate($text);
        $base64QrCode = base64_encode($qrCode);
        return view("user.profile.index", compact("positions", "base64QrCode"));
    }

    public function update(UserEditRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = 'assets/img';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $imageName);
            if (File::exists(public_path($path . "/" . $image))) {
                File::delete(public_path($path . "/" . $image));
            }
            $data['image'] = $imageName;
        }
        $data["updated_at"] = Carbon::now();
        $userId->update($data);
        return redirect()->route("profile")->with("success", "Sửa thông tin thành công");
    }
}
