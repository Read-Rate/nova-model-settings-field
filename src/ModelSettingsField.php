<?php

namespace Readandrate\ModelSettingsField;

use Laravel\Nova\Nova;
use Laravel\Nova\Fields\Field;
use Glorand\Model\Settings\Models\ModelSettings;
use Laravel\Nova\Http\Requests\NovaRequest;

use Illuminate\Support\Facades\Log;

class ModelSettingsField extends Field
{
    public $component = 'nova-model-settings-field';

    public function __construct($name = "Model Settings", $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->hideFromIndex();

    }

    /**
     * Perform any tasks that need to happen when the nova-model-settings-field is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-model-settings-field', __DIR__.'/../dist/js/nova-model-settings-field.js');
        Nova::style('nova-model-settings-field', __DIR__.'/../dist/css/nova-model-settings-field.css');
    }

    /**
     * Build the view that renders the navigation links for the nova-model-settings-field.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-model-settings-field::navigation');
    }

    public function withLinkToTagResource(string $tagResource = null, string $class = 'no-underline dim text-primary font-bold')
    {
        if (is_null($tagResource)) {
            $tagResource = 'App\Nova\ModelSettingsField';
        }

        $uriKey = $tagResource::uriKey();

        return $this->displayUsing(function ($value, $resource, $attribute) use ($class, $uriKey) {
            $settings = $resource->settings()->get();

            return $settings->map(function (ModelSettings $s) use ($class, $uriKey) {
                $href = rtrim(Nova::path(), '/').'/resources/'.$uriKey.'/'.$s->id;

                return "<a href=\"$href\" class=\"$class\">$s->settings</a>";
            });
        });
    }

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        $requestValue = $request[$requestAttribute];
        $settings = json_decode($requestValue, true);
        Log::debug($settings);
        $class = get_class($model);

        $class::saved(function ($model) use ($settings) {
            $model->settings()->clear();
            $model->settings()->setMultiple($settings);
        });
    }

    public function resolveAttribute($resource, $attribute = null)
    {
        return $resource->settings()->all();
    }

}
