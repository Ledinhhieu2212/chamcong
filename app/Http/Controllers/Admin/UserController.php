<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository  $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index(Request $request)
    {
        $title = "Quản lý nhân viên";
        $users = $this->userRepository->search($request);
        $positions = Position::all();
        if (Auth::guard('web')->check()) {
            $loginUser = Auth::guard('web')->id();
        } else {
            $loginUser = 0;
        }
        return view('admin.user.index', compact('title', 'users', 'positions', 'loginUser'));
    }

    public function create()
    {
        $title  = "Thêm nhân viên mới";
        $positions = Position::all();
        return view('admin.user.add', compact('title', 'positions'));
    }
    public function store(CreateRequest $request)
    {
        return $this->userRepository->store($request);
    }
    public function show($id)
    {
        $user =  User::find($id);
        $title = "Cập nhật nhân viên";
        $positions = Position::all();
        return view('admin.user.edit', compact('user', 'title', 'positions'));
    }
    public function update(Request $request, $id)
    {
        return $this->userRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->userRepository->destroy($id);
    }
}
