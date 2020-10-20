<?php

namespace Readandrate\ModelSettingsField\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Readandrate\ModelSettingsField\ModelSettingsField;

class ModelSettingsFieldController extends Controller
{
    public function index(Request $request)
    {
        $query = ModelSettingsField::query();
        return $query;
    }
}
