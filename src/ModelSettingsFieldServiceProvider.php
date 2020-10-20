<?php

namespace Readandrate\ModelSettingsField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Readandrate\ModelSettingsField\Http\Middleware\Authorize;

class ModelSettingsFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-model-settings-field');

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-model-settings-field', __DIR__.'/../dist/js/nova-model-settings-field.js');
            Nova::style('nova-model-settings-field', __DIR__.'/../dist/css/nova-model-settings-field.css');
        });

        $this->app->booted(function () {
            $this->routes();
        });

    }

    /**
     * Register the nova-model-settings-field's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/read-rate/nova-model-settings-field')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
