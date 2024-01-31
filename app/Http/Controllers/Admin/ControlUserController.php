<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Http\Request;

class ControlUserController extends Controller
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
        $users =  $this->UserRepository->paginate((int) 10);
        $template = 'admin.home.dashboard-user.index';
        return view('admin.home.layout', compact('template', 'users', 'title'));
    }

    public function create()
    {
        $title = 'Thêm nhân viên';
        $template = 'admin.home.dashboard-user.add.index';
        return view('admin.home.layout', compact('template', 'title'));
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
        $template = 'admin.home.dashboard-user.edit.index';
        return view('admin.home.layout', compact('template', 'title', 'user'));
    }
    public function update(Request $request, int $id)
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
