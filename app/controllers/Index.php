<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */
use Http\Rest;

class IndexController extends Rest
{
    public function indexAction()
    {
        $ret = 'hello world';
        return $this->response(200, $ret, 200);
    }
}
