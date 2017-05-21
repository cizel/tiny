<?php
use Http\Rest;

class IndexController extends Rest
{
    public function indexAction()
    {
        $ret = 'hello world';
        return $this->response(200, $ret, 200);
    }
}
