<?php

namespace handy\Providers\v1;

use Illuminate\Support\ServiceProvider;

class ProfileImageServiceProvider extends ServiceProvider
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
      $this->app->bind(ProfileImageService::class, function($app){
        return new ProfileImageService();
      });
    }
}
