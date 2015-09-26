<?php

if (!function_exists('trans_rule')) {

    /**
     * Translates the given message based on a count.
     * The count will be calculated according configured rule.
     *
     * @param string        $id
     * @param int           $number
     * @param array         $parameters
     * @param string        $domain
     * @param string|null   $locale
     * @param callable|null $rule
     *
     * @return string
     */
    function trans_rule(
        $id, $number, array $parameters = [], $domain = 'messages', $locale = null, callable $rule = null
    ) {

        if (!is_callable($rule)) {
            $locale = $locale ?: app()->getLocale();
            $rule = app('translation.rules')->get($locale);
        }

        if (is_callable($rule)) {
            $number = $rule($number);
        }

        return trans_choice($id, $number, $parameters, $domain, $locale);
    }
}
