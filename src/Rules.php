<?php

namespace Dmbur\TranslationRule;

class Rules
{
    protected $rules;

    /**
     * @param $locale
     *
     * @return callable|null
     */
    public function get($locale)
    {
        $this->load();
        return isset($this->rules[$locale]) ? $this->rules[$locale] : null;
    }

    /**
     * @return void
     */
    protected function load()
    {
        if (is_null($this->rules)) {
            $file = base_path('resources/lang/translation_rules.php');
            if (is_readable($file)) {
                $this->rules = include $file;
            } else {
                $this->rules = [];
            }
        }
    }
}
