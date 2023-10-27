<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the view composer
        View::composer('*', function ($view) {
            // Do something with the view
        });
    }

    public function register()
    {
        // ...
    }
}
