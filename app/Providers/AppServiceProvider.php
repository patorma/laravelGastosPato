<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // aca con este componente nos conectamos a Vue desde PHP
    public function boot()
    {    
        Inertia::share('flash', function () {
            return ['status' => Session::get('status')];
        });
    }

    
}
