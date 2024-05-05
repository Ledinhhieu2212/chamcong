<?php

namespace App\Providers;


use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
