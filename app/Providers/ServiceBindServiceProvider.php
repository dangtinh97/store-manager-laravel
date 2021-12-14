<?php

namespace App\Providers;

use App\Services\Admin\AdminService;
use App\Services\Admin\AdminServiceInterface;
use App\Services\Project\ProjectService;
use App\Services\Project\ProjectServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Carbon\Laravel\ServiceProvider;

class ServiceBindServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            AdminServiceInterface::class,
            AdminService::class
        );

        $this->app->bind(
            ProjectServiceInterface::class,
            ProjectService::class
        );

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }
}
