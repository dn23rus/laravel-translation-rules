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
