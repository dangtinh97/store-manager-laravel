<?php

namespace App\Providers;

use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Bill\BillRepository;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\Contract\ContractRepository;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Repositories\HistoryBill\HistoryBillRepository;
use App\Repositories\HistoryBill\HistoryBillRepositoryInterface;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );

        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            ContractRepositoryInterface::class,
            ContractRepository::class
        );

        $this->app->bind(
            BillRepositoryInterface::class,
            BillRepository::class
        );

        $this->app->bind(
            HistoryBillRepositoryInterface::class,
            HistoryBillRepository::class
        );
    }
}
