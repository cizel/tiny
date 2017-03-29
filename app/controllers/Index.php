<?php
use Support\Facades\Config;

class IndexController extends \Core\Rest
{

    public function indexAction()
    {
        $config =  Config::get('rest');
    }
}