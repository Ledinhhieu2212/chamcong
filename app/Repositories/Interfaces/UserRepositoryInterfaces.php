<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;

/**
 * Class UserService
 * @package App\Services
 */
interface UserRepositoryInterfaces
{
    public function UserAll();
    public function paginate(int $list);
    public function create(UserCreateRequest $request);
    public function update(UserEditRequest $request, int $id);
    public function delete( int $id);
    public function deleteAll( Request $request );
}
