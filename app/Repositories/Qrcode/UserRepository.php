<?php

namespace App\Repositories\User;

use App\Http\Requests\User\CreateRequest;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

interface UserRepository
{
    public function all();

    public function search(Request $request);

    public function store(CreateRequest $request);
    public function show($id);
    public function update(Request $request,$id);
    public function destroy($id);
}
