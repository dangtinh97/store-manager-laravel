<?php

namespace App\Providers;

use App\Services\Admin\AdminService;
use App\Services\Admin\AdminServiceInterface;
use App\Services\Contract\ContractService;
use App\Services\Contract\ContractServiceInterface;
use App\Services\DeliveryNote\DeliveryNoteService;
use App\Services\DeliveryNote\DeliveryNoteServiceInterface;
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

        $this->app->bind(
            ContractServiceInterface::class,
            ContractService::class
        );

        $this->app->bind(
            DeliveryNoteServiceInterface::class,
            DeliveryNoteService::class
        );
    }
}
