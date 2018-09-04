<?php
/**
 * Singleton
 * User: moyo
 * Date: 2018/4/24
 * Time: 11:38 AM
 */

namespace Carno\I18N\Chips;

trait Singleton
{
    /**
     * @var static
     */
    private static $ins = null;

    /**
     * @return static
     */
    public static function ins() : self
    {
        return self::$ins ?? self::$ins = new static;
    }
}
