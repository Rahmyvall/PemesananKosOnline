<?php

namespace App\Providers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Repositories\BoardingHouseRepository;
use App\Repositories\CityRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register() {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (str_contains(request()->url(), 'ngrok-free.app')) {
            URL::forceScheme('https');
        }
    }
}
