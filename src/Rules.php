<?php

namespace Dmbur\TranslationRule;

class Rules
{
    /**
     * @param $locale
     *
     * @return callable|null
     */
    public function get($locale)
    {
        $rules = $this->rules();
        return isset($rules[$locale]) ? $rules[$locale] : null;
    }

    /**
     * @return array|callable[]
     */
    protected function rules()
    {
        return [
            'ru' => function ($n) {
                return ($n % 10 == 1 && $n % 100 != 11) ? 0 :
                    ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? 1 : 2);
            }
        ];
    }
}
