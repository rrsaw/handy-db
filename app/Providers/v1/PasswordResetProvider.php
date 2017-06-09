<?php

namespace handy\Providers\v1;

use handy\Services\v1;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class PasswordResetProvider extends ServiceProvider
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
        $this->app->bind(PasswordResetService::class, function ($app) {
            return new PasswordResetService();
        });
    }
}
