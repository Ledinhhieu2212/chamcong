<?php

namespace App\Providers;

use App\Repositories\Interfaces\RepositoryInterfaces;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use App\Repositories\Repository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\ServiceInterface;
use App\Services\Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterfaces::class, Repository::class);
        $this->app->bind(UserRepositoryInterfaces::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
