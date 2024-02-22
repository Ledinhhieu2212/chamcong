<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;

class UserRepository implements UserRepositoryInterfaces
{
    public function paginate(int $list)
    {
        return User::paginate($list);
    }
    public function UserAll()
    {
        return User::all();
    }
    public function create(UserCreateRequest $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move('assets/img', $imageName);
            $data['image'] = $imageName;
        }
        $data['password'] = Hash::make($request->password);
        $data["email_verified_at"] = Carbon::now();
        $data["updated_at"] = Carbon::now();
        $data["updated_at"] = Carbon::now();

        return User::create($data);
    }

    public function update(UserEditRequest $request, int $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/img';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            if (File::exists(public_path($path . "/" . $image))) {
                File::delete(public_path($path . "/" . $image));
            }
            $image->move(public_path($path), $imageName);
            $data['image'] = $imageName;
        }
        $data["updated_at"] = Carbon::now();
        return $user->update($data);
    }
    public function delete(int $id)
    {
        $user = User::find($id);
        $path = 'assets/img';
        $image = $user->image;
        if (File::exists(public_path($path . "/" . $image))) {
            File::delete(public_path($path . "/" . $image));
        }
        $user->calendars()->delete();
        return $user->delete();
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $user = User::find($id);
            $path = 'assets/img';
            $image = $user->image;
            if (File::exists(public_path($path . "/" . $image))) {
                File::delete(public_path($path . "/" . $image));
            }
            $user->delete();
        }
        return redirect()->back();
    }
}
