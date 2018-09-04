<?php
/**
 * Languages translator
 * User: moyo
 * Date: 2018/4/24
 * Time: 11:45 AM
 */

namespace Carno\I18N;

use Carno\I18N\Chips\Singleton;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator as STranslator;

class Translator
{
    use Singleton;

    /**
     * @var STranslator[]
     */
    private $translators = [];

    /**
     * @param string $locale
     * @return STranslator
     */
    private function locale(string $locale) : STranslator
    {
        return $this->translators[$locale] ?? $this->translators[$locale] = new STranslator($locale);
    }

    /**
     * @param string $locale
     * @return bool
     */
    public function has(string $locale) : bool
    {
        return isset($this->translators[$locale]);
    }

    /**
     * @param string $locale
     * @return STranslator
     */
    public function get(string $locale) : STranslator
    {
        return $this->translators[$locale];
    }

    /**
     * @param string $locale
     * @return STranslator
     */
    public function new(string $locale) : STranslator
    {
        return $this->locale($locale);
    }

    /**
     * @param string $locale
     * @param string $type
     * @param string $resource
     */
    public function load(string $locale, string $type, string $resource) : void
    {
        $translator = $this->new($locale);

        switch ($type) {
            case 'php':
                $translator->addLoader('array', new ArrayLoader);
                $translator->addResource('array', include $resource, $locale);
                break;
        }
    }
}
