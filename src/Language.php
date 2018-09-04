<?php
/**
 * Language processor
 * User: moyo
 * Date: 2018/4/24
 * Time: 12:00 PM
 */

namespace Carno\I18N;

use Symfony\Component\Translation\Translator as STranslator;

class Language
{
    /**
     * @var STranslator
     */
    private $translator = null;

    /**
     * @var Language[]
     */
    private static $languages = [];

    /**
     * @param string $locale
     * @return Language
     */
    public static function get(string $locale) : self
    {
        return self::$languages[$locale] ?? self::$languages[$locale] = new static($locale);
    }

    /**
     * Language constructor.
     * @param string $locale
     */
    public function __construct(string $locale)
    {
        $this->translator =
            Translator::ins()->has($locale)
                ? Translator::ins()->get($locale)
                : Translator::ins()->new($locale)
        ;
    }

    /**
     * @param string $id
     * @param array $params
     * @return string
     */
    public function __invoke(string $id, array $params = []) : string
    {
        return $this->translator->trans($id, $params);
    }
}
