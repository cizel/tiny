<?php
use Http\Rest;

class IndexController extends Rest
{
    public function indexAction()
    {
        $ret = Config::getSecret('gitlab')->toArray();
        return $this->response(200, $ret, 200);
    }
}
