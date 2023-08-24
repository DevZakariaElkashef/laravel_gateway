<?php

namespace App\Providers;

use App\Http\Interfaces\FatoorahServicesInterface;
use App\Http\Services\FatoorahServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FatoorahServicesInterface::class, FatoorahServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
