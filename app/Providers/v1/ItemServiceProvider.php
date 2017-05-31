<?php

namespace handy\Providers\v1;

use handy\Services\v1;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ItemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('item_confirmation', function ($attribute, $value, $parameters, $validator) {
            return $value == 1 || $value == 0;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemService::class, function ($app) {
            return new ItemService();
        });
    }
}
