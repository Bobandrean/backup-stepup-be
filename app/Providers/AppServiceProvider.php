<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryImplement;
use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsRepositoryImplement;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Dashboard\DashboardRepositoryImplement;
use App\Repositories\Quiz\QuizRepository;
use App\Repositories\Quiz\QuizRepositoryImplement;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthRepository::class,
            AuthRepositoryImplement::class,

        );

        $this->app->bind(
            NewsRepository::class,
            NewsRepositoryImplement::class,

        );

        $this->app->bind(
            DashboardRepository::class,
            DashboardRepositoryImplement::class,
        );

        $this->app->bind(
            QuizRepository::class,
            QuizRepositoryImplement::class,
        );
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
