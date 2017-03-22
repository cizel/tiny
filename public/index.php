<?php
/**
 * 设置网站的根目录
 */
define('APP_PATH', dirname(__DIR__));

$app = new Yaf_Application(APP_PATH.'/conf/app.ini');

$app->getConfig()->get('application.bootstrap') && $app->bootstrap();

$app->run();
