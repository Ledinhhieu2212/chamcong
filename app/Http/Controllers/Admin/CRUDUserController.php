<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Position;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CRUDUserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterfaces $UserRepository)
    {
        View::share('positons', Position::where('id', '!=', 999)->orderBy('id', 'ASC')->get());
        $this->UserRepository = $UserRepository;
    }

    public function create()
    {
        $users_array = User::where('position_id', '!=', 999)->orderBy('id', 'asc')->get();
        $admin = Auth::user();
        return view('admin.user.add', compact('users_array', 'admin'));
    }
    public function store(UserCreateRequest $request)
    {
        $this->UserRepository->create($request);
        return redirect()->route('admin.user.create')->with('success', 'Đăng ký thành công 1 nhân viên');
    }

    public function edit(int $id)
    {
        $title = 'Sửa nhân viên';
        $users_array = User::where('position_id', '!=', 999)->get();
        $user = User::find($id);
        return view('admin.user.edit', compact('title', 'user', 'users_array'));
    }
    public function update(UserEditRequest $request, int $id)
    {
        $this->UserRepository->update($request, $id);
        return redirect()->route('admin.user.create');
    }

    public function destroy(int $id)
    {
        $this->UserRepository->delete($id);
        return redirect()->route('admin.user.create')->with('success', 'Xóa thành công nhân viên');
    }

    public function deleteALl(Request $request)
    {
        if ($request->ids !== null) {
            $this->UserRepository->deleteALl($request);
            return redirect()->route('admin.user.create')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('admin.user.create');
        }
    }
}
