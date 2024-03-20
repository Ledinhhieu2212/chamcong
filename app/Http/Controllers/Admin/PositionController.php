<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index()
    {
        return view("admin.position.index");
    }
    public function __construct()
    {
        view()->share("positions", Position::where("id", "!=", 999)->orderBy('id', 'asc')->get());
    }

    public function store(Request $request)
    {
        $position = Position::create($request->all());
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }
}
