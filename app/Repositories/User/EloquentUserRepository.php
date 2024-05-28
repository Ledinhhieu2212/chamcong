<?php

namespace App\Repositories\User;

use App\Http\Requests\User\CreateRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->get();
    }
    public function search(Request $request)
    {
        $query = $this->model;

        if ($request->fullname !== null) {
            $query = $query->where('fullname', 'like', '%' . $request->fullname . '%');
        }

        if ($request->username !== null) {
            $query = $query->where('username', 'like', '%' . $request->username . '%');
        }

        if ($request->job !== null) {
            $query = $query->where('position_id', 'like', '%' . $request->job . '%');
        }

        return $query->orderBy('fullname')->paginate(5);
    }

    public function store(CreateRequest $request)

    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move('assets/img/avatar', $imageName);
            $data['image'] = $imageName;
        }
        $data['password'] = Hash::make($request->password);
        $data["email_verified_at"] = now();
        $data['position_id'] = $request->job;
        $this->model->create($data);
        return  redirect()->route('admin.user.index')->with('success', 'Tạo thành công nhân viên');
    }

    public function show($id)
    {


    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/img/avatar';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            if (File::exists($path . "/" . $image)) {
                File::delete($path . "/" . $image);
            }
            $image->move($path, $imageName);
            $data['image'] = $imageName;
        }
        $data["updated_at"] = now();
        $data['position_id'] = $request->job;
        $user->update($data);
        return  redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công nhân viên');
    }

    public function destroy($id)
    {
        $user = $this->model->find($id);
        $path = 'assets/img/avatar';
        $image = $user->image;
        if (File::exists($path . "/" . $image)) {
            File::delete($path . "/" . $image);
        }
        $user->delete();
        return  redirect()->route('admin.user.index')->with('success', 'Xóa thành công nhân viên');
    }
}
