<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Di;

use exception\InvalidConfigException;
use Tiny;

class Instance
{
    /**
     * @var string the component ID, class name, interface name or alias name
     */
    public $id;


    /**
     * Constructor.
     * @param string $id the component ID
     */
    protected function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Creates a new Instance object.
     * @param string $id the component ID
     * @return Instance the new Instance object.
     */
    public static function of($id)
    {
        return new static($id);
    }

    public static function ensure($reference, $type = null, $container = null)
    {
        if (is_array($reference)) {
            $class = isset($reference['class']) ? $reference['class'] : $type;
            if (!$container instanceof Container) {
                $container = Tiny::$container;
            }
            unset($reference['class']);
            return $container->get($class, [], $reference);
        } elseif (empty($reference)) {
            throw new InvalidConfigException('The required component is not specified.');
        }

        if (is_string($reference)) {
            $reference = new static($reference);
        } elseif ($type === null || $reference instanceof $type) {
            return $reference;
        }

        if ($reference instanceof self) {
            $component = $reference->get($container);
            if ($type === null || $component instanceof $type) {
                return $component;
            } else {
                throw new InvalidConfigException('"' . $reference->id . '" refers to a ' . get_class($component) . " component. $type is expected.");
            }
        }

        $valueType = is_object($reference) ? get_class($reference) : gettype($reference);
        throw new InvalidConfigException("Invalid data type: $valueType. $type is expected.");
    }

    /**
     * Returns the actual object referenced by this Instance object.
     * @param ServiceLocator|Container $container the container used to locate the referenced object.
     * If null, the method will first try `Yii::$app` then `Yii::$container`.
     * @return object the actual object referenced by this Instance object.
     */
    public function get($container = null)
    {
        if ($container) {
            return $container->get($this->id);
        }
        return Tiny::$container->get($this->id);
    }
}
