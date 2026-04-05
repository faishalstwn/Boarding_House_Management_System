<?php

namespace App\Providers;

use App\Interface\BoardingHouseRepositoryInterface;
use App\Interface\CityRepositoryInterface;
use App\Repositories\CityRepository;
use App\Interface\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\BoardingHouseRepository;
use App\Interface\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\url;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        CityRepositoryInterface::class,
        CityRepository::class
    );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            BoardingHouseRepositoryInterface::class,
            BoardingHouseRepository::class
        );

         $this->app->bind(
        TransactionRepositoryInterface::class,
        TransactionRepository::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(str_contains(request()->url(), 'ngrok-free.dev')){
            URL::forceScheme('https');
        }
    }
}
