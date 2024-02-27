<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit(){
        $positions = Position::all();
        return view("user.profile.index" , compact("positions"));
    }

    public function update(UserEditRequest $request)
    {
        $data = $request->all();
        $user = Auth::user()->id;
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
        $user->update($data);
        return redirect()->route("profile")->with("success", "Sửa thông tin thành công");
    }
}
