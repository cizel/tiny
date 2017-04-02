<?php

class IndexController extends \Core\Rest
{
    public function indexAction()
    {
        $ret[] = [
            "rel"   => "collection https://www.example.com/zoos",
            "href"  => "https://api.example.com/zoos",
            "title" => "List of zoos",
            "type"  => "application/vnd.yourformat+json"
        ];
        $this->response('10001', $ret, 200);
    }
}