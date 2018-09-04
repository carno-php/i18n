<?php

namespace Carno\I18N
{
    define('CARNO_COMPONENTS_I18N', [
        Initialize::class,
    ]);

    /**
     * @param string $locale
     * @return Language
     */
    function language(string $locale) : Language
    {
        return Language::get($locale);
    }
}
