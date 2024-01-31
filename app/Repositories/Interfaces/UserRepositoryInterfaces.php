<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

/**
 * Class UserService
 * @package App\Services
 */
interface UserRepositoryInterfaces
{

    public function paginate(int $list);
    public function create(UserCreateRequest $request);
    public function update(Request $request, int $id);
    public function delete( int $id);
}
