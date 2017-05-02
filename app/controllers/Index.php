<?php
use Http\Rest;
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
        $log = new Logger(APP_PATH.'/runtime/');
        $log->info(Config::get('routes'));
        $this->response('200', $ret, 200);
    }
}
