<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;

/**
 * Class UserService
 * @package App\Services
 */
interface CalendarRepository
{

    public function paginate(int $list);
    public function create(UserCreateRequest $request);
    public function update(UserEditRequest $request, int $id);
    public function delete( int $id);
}
