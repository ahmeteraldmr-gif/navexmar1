<?php

use Illuminate\Support\Facades\App;

if (!function_exists('__t')) {
    /**
     * Helper for inline bilingual translation.
     * __t('Türkçe Metin', 'English Text')
     */
    function __t($tr, $en)
    {
        return App::getLocale() === 'en' ? $en : $tr;
    }
}
