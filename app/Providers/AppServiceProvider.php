<?php

namespace App\Providers;

use App\Post;
use App\Repositories\Posts;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() != 'production') {
            /**
             * Laravel debug bar
             */
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //we can listen to object resolving
        $this->app->resolving(function ($object, $app) {
            echo "resolving object";
            if ($object instanceof Posts) {
                dd($object);
            }
        });
    }
}
