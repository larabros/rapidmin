<?php

namespace Larabros\Rapidmin;

use Illuminate\Support\ServiceProvider;
use Larabros\Rapidmin\Macros\UiRegistrar;
use Larabros\Rapidmin\Macros\WidgetRegistrar;

/**
 * Registers and publishes Rapidmin configuration and resource files.
 *
 * @package    Rapidmin
 * @author     Hassan Khan <contact@hassankhan.me>
 * @author     Cai Leao <cainaleao.uk@gmail.com>
 * @link       https://github.com/larabros/rapidmin
 * @license    MIT
 */
class RapidminServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
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
            __DIR__.'/../.bowerrc'    => base_path('.bowerrc'),
            __DIR__.'/../bower.json'  => base_path('bower.json'),
            __DIR__.'/../gulpfile.js' => base_path('gulpfile.js'),
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

        $this->registerHtmlBuilder();
        $this->registerFormBuilder();

        $this->app->alias('html', HtmlBuilder::class);
        $this->app->alias('form', FormBuilder::class);
    }

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            return new HtmlBuilder($app['url']);
        });

        $this->registerMacros();
    }

    protected function registerMacros()
    {
        $html = $this->app['html'];
        $view = $this->app['view'];

        $registrars = [
            new UiRegistrar($view),
            new WidgetRegistrar($view),
        ];

        foreach ($registrars as $registrar) {
            foreach ($registrar->provides() as $macroName) {
                list($name, $callable) = $registrar->$macroName();
                $html->macro($name, $callable);
            }
        }
    }

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app) {
             return (new FormBuilder(
                 $app['html'],
                 $app['url'],
                 $app['session.store']->getToken()
             ))->setSessionStore($app['session.store']);
         });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['html', HtmlBuilder::class, 'form', FormBuilder::class];
    }
}
