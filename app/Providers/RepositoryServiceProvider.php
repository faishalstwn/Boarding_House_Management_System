<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\BoardingHouseRepository;
use App\interface\CategoryRepositoryInterface;
use App\interface\BoardingHouseRepositoryInterface;
use App\interface\CityRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\interface\TransactionRepositoryInterface;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BoardingHouseRepositoryInterface::class, BoardingHouseRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
  
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
