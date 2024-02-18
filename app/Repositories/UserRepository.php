<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterfaces
{
    public function paginate(int $list)
    {
        return User::paginate($list);
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
        return User::create($data);
    }

    public function update(UserEditRequest $request, int $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($request->has('image')) {
            $path= 'assets/img';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $imageName);
            $data['image'] = $imageName;
            if(File::exists(public_path($path."/".$image))) {
                File::delete(public_path($path."/".$image));
            }
        }
        return $user->update($data);
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $path= 'assets/img';
        $image = $user->image;
        if(File::exists(public_path($path."/".$image))) {
            File::delete(public_path($path."/".$image));
        }
        return User::findOrFail($id)->delete();
    }
}
