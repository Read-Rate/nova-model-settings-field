<?php

namespace Readandrate\ModelSettingsField\Tests;

use Readandrate\ModelSettingsField\Http\Controllers\ModelSettingsFieldController;
use Readandrate\ModelSettingsField\ModelSettingsField;
use Symfony\Component\HttpFoundation\Response;

class ModelSettingsFieldControllerTest extends TestCase
{
    /** @test */
    public function it_can_can_return_a_response()
    {
        $this
            ->get('nova-vendor/read-rate/nova-model-settings-field/endpoint')
            ->assertSuccessful();
    }
}
