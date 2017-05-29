<?php

namespace handy\Providers\v1;
use handy\Services\v1;
use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(ReviewService::class, function($app){
        return new ReviewService();
      });
    }
}
