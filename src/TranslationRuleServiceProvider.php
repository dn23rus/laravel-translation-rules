<?php

namespace Dmbur\TranslationRule;

use Illuminate\Support\ServiceProvider;

class TranslationRuleServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->app->singleton('translation.rules', function () {
            return new Rules();
        });
    }

    public function boot()
    {
        $this->publishes([
            dirname(__DIR__) . '/resources/translation_rules.php' => base_path('resources/lang/translation_rules.php'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function provides()
    {
        return [
            'translation.rules'
        ];
    }
}
