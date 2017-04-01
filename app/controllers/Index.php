<?php

class IndexController extends \Core\Rest
{
    public function indexAction()
    {
        $this->response('10001', 'hello,tiny');
    }
}