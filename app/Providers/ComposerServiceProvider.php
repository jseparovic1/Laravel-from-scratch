<?php

namespace App\Providers;

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('sidebar.archives', function ($view) {
            $view->with('archives', Post::archives());
        });

        View::composer('sidebar.tags', function ($view) {
            $view->with('tags', Tag::has('posts')->pluck('name'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
