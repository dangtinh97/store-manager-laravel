<?php

namespace App\Providers;

use App\Services\Admin\AdminService;
use App\Services\Admin\AdminServiceInterface;
use Carbon\Laravel\ServiceProvider;

class ServiceBindServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            AdminServiceInterface::class,
            AdminService::class
        );
    }
}
