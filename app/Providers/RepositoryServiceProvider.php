<?php

namespace App\Providers;

use App\Interfaces\SaleRepositoryInterface;
use App\Repositories\SaleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(SaleRepositoryInterface::class,SaleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
