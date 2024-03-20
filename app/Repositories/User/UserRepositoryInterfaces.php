<?php

namespace App\Repositories\User;

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

    public function profile(UserEditRequest $request);
    public function searchCalendar(Request $request);
    public function registerCalendar(Request $request);

}
