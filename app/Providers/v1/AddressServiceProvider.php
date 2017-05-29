<?php

namespace handy\Providers\v1;
use handy\Services\v1;
use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
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
      $this->app->bind(AddressService::class, function($app){
        return new AddressService();
      });
    }
}
