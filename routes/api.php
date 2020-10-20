<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ModelSettingsField API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your nova-model-settings-field. These routes
| are loaded by the ServiceProvider of your nova-model-settings-field. They are protected
| by your nova-model-settings-field's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('endpoint', \Readandrate\ModelSettingsField\Http\Controllers\ModelSettingsFieldController::class . '@index');
