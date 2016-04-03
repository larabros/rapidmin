<?php

namespace Larabros\Rapidmin;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class RapidminServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Config files
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('rapidmin.php'),
        ], 'config');

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidmin');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rapidmin'),
        ], 'views');

        // Bower and Gulp build file
        $this->publishes([
            __DIR__.'/../.bowerrc'        => base_path('.bowerrc'),
            __DIR__.'/../bower.json'      => base_path('bower.json'),
            __DIR__.'/../gulpfile.js'     => base_path('gulpfile.js'),
        ], 'build');

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'rapidmin.config');
    }

    /**
     * Boots any Laravel package dependencies.
     *
     * @return void
     */
    protected function bootDependencies()
    {
    }

    /**
     * Registers any Laravel package dependencies.
     *
     * @return void
     */
    protected function registerDependencies()
    {
        // $this->app->register(Menu\MenuServiceProvider::class);
    }
}
