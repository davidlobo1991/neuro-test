<?php

namespace App\Providers;

use App\Repositories\DomainCategoryRepository;
use App\Repositories\DomainCategoryRepositoryInterface;
use App\Repositories\SessionScoreRepository;
use App\Repositories\SessionScoreRepositoryInterface;
use App\Services\Providers\SessionScoresProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SessionScoreRepositoryInterface::class, SessionScoreRepository::class);
        $this->app->bind(DomainCategoryRepositoryInterface::class, DomainCategoryRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
