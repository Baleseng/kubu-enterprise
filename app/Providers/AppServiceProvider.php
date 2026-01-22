<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
        // This regex allows for international formats
        return preg_match('/^\+?[1-9]\d{1,14}$/', $value);
        });
    }
}
