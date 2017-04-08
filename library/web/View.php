<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace web;

use base\Component;
use Yaf_Dispatcher;

class View extends Component
{
    public function disable()
    {
        Yaf_Dispatcher::getInstance()->disableView();
    }
}