<?php

namespace App\Providers;

use App\Repository\CitizenRepository;
use App\Repository\CitizenRepositoryInterface;
use App\Repository\DelegateRepository;
use App\Repository\DelegateRepositoryInterface;
use App\Repository\DeliveryRepository;
use App\Repository\DeliveryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\ManagerRepositoryInterface',
            'App\Repository\ManagerRepository');

        $this->app->bind(
            'App\Repository\AqelRepositoryInterface',
            'App\Repository\AqelRepository');

            $this->app->bind(DeliveryRepositoryInterface::class, DeliveryRepository::class);

            $this->app->bind(DelegateRepositoryInterface::class, DelegateRepository::class);

            $this->app->bind(CitizenRepositoryInterface::class, CitizenRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
