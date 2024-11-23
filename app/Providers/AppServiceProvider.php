<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->share('newNotifications', DB::table('notifications'));
        view()->share('oldNotifications', DB::table('notifications'));
        view()->share('websiteParam', DB::table('settings')->first());
    }
}