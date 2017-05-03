<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

define('APP_PATH', dirname(__DIR__));

$app = new Yaf_Application(APP_PATH.'/conf/app.ini');

$app->getConfig()->get('application.bootstrap') && $app->bootstrap();

