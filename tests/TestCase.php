<?php

namespace Readandrate\ModelSettingsField\Tests;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;
use Readandrate\ModelSettingsField\ModelSettingsFieldServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();

        Route::middlewareGroup('nova', []);
    }

    protected function getPackageProviders($app)
    {
        return [
            ModelSettingsFieldServiceProvider::class,
        ];
    }
}
