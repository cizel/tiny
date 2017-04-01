<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */
namespace Support\Test;

use \Yaf_Application as Application;

defined('APP_PATH') || define('APP_PATH', realpath(__DIR__ . '/../../../'));

abstract class YafCase extends \PHPUnit_Framework_TestCase
{
    protected static $bootstrap = true;

    protected static $autoInit = true;

    protected static $useYaf = true;

    protected $app = null;

    public function __construct()
    {
        parent::__construct();

        if (static::$useYaf && !extension_loaded('yaf')) {
            $this->markTestSkipped('YAF扩展未加载[not YAF extension]');
        }
        if (static::$autoInit) {
            if (!$this->app = static::app()) {
                $this->markTestSkipped('APP 启动失败！');
            }
        }
    }

    public static function app()
    {
        if (! $app = Application::app()) {
            $conf = APP_PATH.'/conf/app.ini';
            $app  = new Application($conf);
            $conf = $app->getConfig();
            if (static::$bootstrap && $conf->get('application.bootstrap')) {
                $app->bootstrap();
            }
        }
        return $app;
    }
}
