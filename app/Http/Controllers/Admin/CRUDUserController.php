<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Position;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Http\Request;

class CRUDUserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterfaces $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    public function create()
    {
        $positons = Position::all();
        return view('admin.user.add', compact('positons'));
    }
    public function store(UserCreateRequest $request)
    {
        $this->UserRepository->create($request);
        return redirect()->route('admin.user.create');
    }
    public function edit(int $id)
    {
        $positons = Position::all();
        $title = 'Sửa nhân viên';
        $user = User::find($id);
        return view('admin.user.edit', compact('title', 'user', 'positons'));
    }
    public function update(UserEditRequest $request, int $id)
    {
        $this->UserRepository->update($request, $id);
        return redirect()->route('admin.user.create');
    }

    public function delete(int $id)
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
