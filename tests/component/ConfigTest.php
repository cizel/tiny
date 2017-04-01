<?php
namespace tests\Component;

use Config;
use Support\Test\YafCase as TestCase;

/**
 * @coversDefaultClass \Config
 */
class ConfigTest extends TestCase
{
    protected static $autoInit = true;

    protected static $useYaf = true;

    /**
     * @covers ::get
     * 测试配置和配置文件是否一致
     */
    public function testConfigConsistency()
    {
        $env=$this->app->environ();
        $config=parse_ini_file(APP_PATH.'/conf/app.ini', true);
        $current=$config[$env.':common'] + $config['common'];
        foreach ($current as $key => $value) {
            $this->assertSame($current[$key], Config::get($key), $key);
        }
    }

    /**
     * 检测 Get 的值不存在为空值的情况
     */
    public function testEmpty()
    {
        $this->assertSame(Config::get(uniqid('_te_', true)), null);
    }

    /**
     * 测试 Get 的默认值的情况
     */
    public function testDefault()
    {
        $key=uniqid('_td_', true);
        $default=array(false,null,1,true,array(1,2,4),'test');
        foreach ($default as $k => $d) {
            $this->assertSame(Config::get($k . $key, $d), $d);
        }
    }

    /**
     * @depends testConfigConsistency
     */
    public function testSecretPath()
    {
        $secret_ini=Config::get('secret_path');
        $this->assertFileExists($secret_ini, $secret_ini.' Config cannot find');
        return $secret_ini;
    }

}
