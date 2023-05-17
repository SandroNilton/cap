<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Support\Facades\URL;

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
        //comentar para generar key
        //if ($this->app->enviroment('production')) {
        //  \URL::forceScheme('https');
        //}
        //\URL::forceRootUrl(\Config::get('app.url'));    
        //if (str_contains(\Config::get('app.url'), 'https://')) {
        //  \URL::forceScheme('https');
        //}

        if($this->app->environment('production')) {
          URL::forceScheme('https');
        }
    }
}
