<?php

namespace App\Providers;

use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );
    }
}
