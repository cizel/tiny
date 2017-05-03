<?php
use Http\Rest;
class IndexController extends Rest
{
    public function indexAction()
    {
        $ret[] = [
            "href"  => "https://api.example.com/zoos",
            "title" => "List of zoos",
            "type"  => "application/vnd.yourformat+json"
        ];
        $logger = new Logger(APP_PATH.'/runtime');
        $logger->info('test log');
        return $this->response(200, $ret, 200);
    }
}
