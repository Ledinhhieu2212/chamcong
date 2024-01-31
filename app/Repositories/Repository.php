<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\RepositoryInterfaces;

/**
 * Class UserService
 * @package App\Services
 */
class Repository implements RepositoryInterfaces
{
    public function paginate()
    {
        return User::paginate(5);
    }
}
