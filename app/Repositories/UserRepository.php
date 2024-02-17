<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
        $data['password'] = Hash::make($request->password);
        return User::create($data);
    }

    public function update(UserEditRequest $request, int $id)
    {
        return User::findOrFail($id)->update($request->all());
    }

    public function delete(int $id){
        return User::findOrFail($id)->delete();
    }
}
