<?php

namespace App\Providers;

use App\Services\Contracts\LuckyServiceInterface;
use App\Services\Contracts\UserLinkServiceInterface;
use App\Services\LuckyService;
use App\Services\UserLinkService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserLinkServiceInterface::class, UserLinkService::class);

        $this->app->singleton(LuckyServiceInterface::class, LuckyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
