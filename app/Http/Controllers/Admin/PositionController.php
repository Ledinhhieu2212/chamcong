<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = Position::class;
    }

    public function index()
    {
        $title = "Quản lý chức vụ";
        $positions = $this->model::withCount('users')->paginate(10);
        return view("admin.position.index", compact("title", 'positions'));
    }
    public function create()
    {
        $title = 'Thêm công việc';
        return view('admin.position.add', compact('title'));
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        if (!Position::where('job', $name)->exists()) {
            Position::create([
                'job' => $name,
                'price' => $request->input('price'),
            ]);
            return redirect()->route('admin.position.store')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.position.create')->with('error', 'Đã có công việc này');
        }
    }
    public function show($id)
    {
        $title = "Sửa chức vụ";
        $position = $this->model::findOrFail($id);
        return view('admin.position.edit', compact('title', 'position'));
    }
    public function update(Request $request, $id)
    {
        $this->model::find($id)->update([
            'job' =>  $request->input('job'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('admin.position.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy(string $id)
    {
        $position = $this->model::findOrFail($id);
        if ($position->users()->count() == 0) {
            $position->delete();
            return  redirect()->route('admin.position.index')->with('success', 'Xóa thành công');
        } else {
            return  redirect()->route('admin.position.index')->with('error', 'Có nhân viên lựa chọn công việc này');
        }
    }
}
