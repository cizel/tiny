<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

if (!class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
}
/**
 * Set the root directory
 */
define('APP_PATH', dirname(__DIR__));

/**
 *  New Yaf Application
 */
$app = new Yaf_Application(APP_PATH.'/conf/app.ini');

/**
 * Set bootstrap From app.ini
 */

$app->getConfig()->get('application.bootstrap') && $app->bootstrap();

