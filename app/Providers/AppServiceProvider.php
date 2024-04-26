<?php

namespace App\Providers;


use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
        $this->app->bind(UserRepositoryInterfaces::class, UserRepository::class);
    }

    public function boot(): void
    {
    }
}
