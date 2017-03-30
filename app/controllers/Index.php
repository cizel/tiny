<?php
use Support\Facades\Config;

class IndexController extends \Core\Rest
{

    public function indexAction()
    {
        $this->response('-1', 'index empty', '200');
    }
}