<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */
use exception\InvalidConfigException;
use log\Logger;

/**
 * Gets the application start timestamp.
 */
defined('APP_BEGIN_TIME') or define('APP_BEGIN_TIME', microtime(true));
/**
 * This constant defines the framework installation directory.
 */
defined('APP_PATH') or define('APP_PATH', __DIR__);
/**
 * This constant defines whether the application should be in debug mode or not. Defaults to false.
 */
defined('APP_DEBUG') or define('APP_DEBUG', false);

defined('APP_ENV') or define('APP_ENV', 'product');
/**
 * Whether the the application is running in production environment
 */
defined('APP_ENV_PROD') or define('APP_ENV_PROD', APP_ENV === 'product');
/**
 * Whether the the application is running in development environment
 */
defined('APP_ENV_DEV') or define('APP_ENV_DEV', APP_ENV === 'develop');
/**
 * Whether the the application is running in testing environment
 */
defined('APP_ENV_TEST') or define('APP_ENV_TEST', APP_ENV === 'test');

class App
{
    public static $container;

    public static function createObject($type, array $params = [])
    {
        if (is_string($type)) {
            return static::$container->get($type, $params);
        } elseif (is_array($type) && isset($type['class'])) {
            $class = $type['class'];
            unset($type['class']);
            return static::$container->get($class, $params, $type);
        } elseif (is_callable($type, true)) {
            return static::$container->invoke($type, $params);
        } elseif (is_array($type)) {
            throw new InvalidConfigException('Object configuration must be an array containing a "class" element.');
        } else {
            throw new InvalidConfigException('Unsupported configuration type: ' . gettype($type));
        }
    }

    /**
     * Configures an object with the initial property values.
     * @param object $object the object to be configured
     * @param array $properties the property initial values given in terms of name-value pairs.
     * @return object the object itself
     */
    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }
        return $object;
    }
}
