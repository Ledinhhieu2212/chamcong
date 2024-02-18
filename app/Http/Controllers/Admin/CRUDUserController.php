<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CRUDUserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterfaces $UserRepository)
    {
        # code...
        $this->UserRepository = $UserRepository;
    }
    public function dashboard()
    {
        $title = 'Thông tin nhân viên';
        $users =  $this->UserRepository->paginate((int) User::count() / 2);
        return view('admin.user.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = 'Thêm nhân viên';
        $template = 'admin.home.dashboard-user.add.index';
        return view('admin.user.add', compact('title'));
    }
    public function store(UserCreateRequest $request)
    {


        $this->UserRepository->create($request);
        return redirect()->route('admin.user');
    }
    public function edit(int $id)
    {
        $title = 'Sửa nhân viên';
        $user = User::find($id);
        return view('admin.user.edit', compact('title', 'user'));
    }
    public function update(UserEditRequest $request, int $id)
    {
        $this->UserRepository->update($request, $id);
        return redirect()->route('admin.user');
    }

    public function delete(int $id)
    {
        $this->UserRepository->delete($id);
        return redirect()->route('admin.user')->with('success', 'Xóa thành công nhân viên');
    }
}
