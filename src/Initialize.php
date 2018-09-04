<?php
/**
 * Component initialize
 * User: moyo
 * Date: 2018/9/4
 * Time: 12:00 PM
 */

namespace Carno\I18N;

use Carno\Console\Component;
use Carno\Console\Contracts\Application;
use Carno\Console\Contracts\Bootable;
use Carno\Container\DI;

class Initialize extends Component implements Bootable
{
    /**
     * @param Application $app
     */
    public function starting(Application $app) : void
    {
        $app->starting()->add(function () {
            DI::object(Scanner::class, CWD . '/lang');
        });
    }
}
