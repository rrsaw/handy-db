<?php

namespace handy\Providers\v1;

use handy\Services\v1;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ReviewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('reviews_value', function ($attribute, $value, $parameters, $validator) {
            // return $value == 1 || $value == 2 || $value == 3 || $value == 4 || $value == 5;
            return $value <= 5 && $value >= 1;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReviewService::class, function ($app) {
            return new ReviewService();
        });
    }
}
