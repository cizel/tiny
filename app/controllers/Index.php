<?php
use Web\Rest;

class IndexController extends Rest
{
    public function indexAction()
    {
        $ret[] = [
            "rel"   => "collection https://www.example.com/zoos",
            "href"  => "https://api.example.com/zoos",
            "title" => "List of zoos",
            "type"  => "application/vnd.yourformat+json"
        ];
        var_dump(Tiny::getLogger());
        Tiny::info('你好', 'cate');
        $this->response('200', $ret, 200);
    }
}