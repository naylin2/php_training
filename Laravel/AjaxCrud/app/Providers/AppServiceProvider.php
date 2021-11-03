<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Posts\PostDaoInterface', 'App\Dao\Posts\PostDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Posts\PostServiceInterface', 'App\Services\Posts\PostService');
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
