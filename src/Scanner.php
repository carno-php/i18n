<?php
/**
 * Languages scanner
 * User: moyo
 * Date: 2018/4/24
 * Time: 11:37 AM
 */

namespace Carno\I18N;

class Scanner
{
    /**
     * @inject
     * @var Translator
     */
    private $translator = null;

    /**
     * Scanner constructor.
     * @param string $dir
     */
    public function __construct(string $dir)
    {
        if (is_dir($dir)) {
            $handle = opendir($dir);
            while (false !== $file = readdir($handle)) {
                if (in_array($file, ['.', '..'])) {
                    continue;
                }

                list($locale, $type) = explode('.', $file);

                if ($locale && $type) {
                    $this->translator->load($locale, $type, $dir . '/' . $file);
                }
            }
            closedir($handle);
        }
    }
}
