<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */

class Arr
{
    /**
     * 判断是否为 数组 或者 ArrayAccess 对象
     * @param $value
     * @return bool
     */
    public static function accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    public static function divide($array)
    {
        return [array_keys($array), array_values($array)];
    }

    public static function first($array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) {
                return Helper::value($default);
            }

            foreach ($array as $item) {
                return $item;
            }
        }

        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }

        return Helper::value($default);
    }

    public static function last($array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            return empty($array) ? Helper::value($default) : end($array);
        }

        return static::first(array_reverse($array, true), $callback, $default);
    }

    public static function has($array, $keys)
    {
        if (is_null($keys)) {
            return false;
        }

        $keys = (array) $keys;

        if (!$array) {
            return false;
        }

        if ($keys === []) {
            return false;
        }

        foreach ($keys as $key) {
            $subKeyArray = $array;

            if (static::exists($array, $key)) {
                continue;
            }

            foreach (explode('.', $key) as $segment) {
                if (static::accessible($subKeyArray) && static::exists($subKeyArray, $segment)) {
                    $subKeyArray = $subKeyArray[$segment];
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    public static function isAssoc(array $array)
    {
        $keys = array_keys($array);

        return array_keys($keys) !== $keys;
    }

    public static function only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }

    public static function prepend($array, $value, $key = null)
    {
        if (is_null($key)) {
            array_unshift($array, $value);
        } else {
            $array = [$key => $value] + $array;
        }

        return $array;
    }

    public static function pull(&$array, $key, $default = null)
    {
        $value = static::get($array, $key, $default);

        static::forget($array, $key);

        return $value;
    }

    public static function add($array, $key, $value)
    {
        if (is_null(static::get($array, $key))) {
            static::set($array, $key, $value);
        }

        return $array;
    }

    public static function get($array, $key, $default = null)
    {
        if (!static::accessible($array)) {
            return Helper::value($default);
        }

        if (is_null($key)) {
            return $array;
        }

        if (static::exists($array, $key)) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (static::accessible($array) && static::exists($array, $segment)) {
                $array = $array[$segment];
            } else {
                return Helper::value($default);
            }
        }

        return $array;
    }

    public static function set(&$array, $key, $value)
    {
        if (is_null($key)) {
            return $array = $value;
        }

        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            // If the key doesn't exist at this depth, we will just create an empty array
            // to hold the next value, allowing us to create the arrays to hold final
            // values at the correct depth. Then we'll keep digging into the array.
            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return $array;
    }

    public static function except($array, $keys)
    {
        static::forget($array, $keys);

        return $array;
    }

    public static function forget(&$array, $keys)
    {
        $original = &$array;

        $keys = (array) $keys;

        if (count($keys) === 0) {
            return;
        }

        foreach ($keys as $key) {
            // if the exact key exists in the top-level, remove it
            if (static::exists($array, $key)) {
                unset($array[$key]);

                continue;
            }

            $parts = explode('.', $key);

            // clean up before each pass
            $array = &$original;

            while (count($parts) > 1) {
                $part = array_shift($parts);

                if (isset($array[$part]) && is_array($array[$part])) {
                    $array = &$array[$part];
                } else {
                    continue 2;
                }
            }

            unset($array[array_shift($parts)]);
        }
    }


    public static function exists($array, $key)
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    public static function filter($array, $filters)
    {
        $result = [];
        $forbiddenVars = [];

        foreach ($filters as $var) {
            $keys = explode('.', $var);
            $globalKey = $keys[0];
            $localKey = isset($keys[1]) ? $keys[1] : null;

            if ($globalKey[0] === '!') {
                $forbiddenVars[] = [
                    substr($globalKey, 1),
                    $localKey,
                ];
                continue;
            }

            if (empty($array[$globalKey])) {
                continue;
            }
            if ($localKey === null) {
                $result[$globalKey] = $array[$globalKey];
                continue;
            }
            if (!isset($array[$globalKey][$localKey])) {
                continue;
            }
            if (!array_key_exists($globalKey, $result)) {
                $result[$globalKey] = [];
            }
            $result[$globalKey][$localKey] = $array[$globalKey][$localKey];
        }

        foreach ($forbiddenVars as $var) {
            list($globalKey, $localKey) = $var;
            if (array_key_exists($globalKey, $result)) {
                unset($result[$globalKey][$localKey]);
            }
        }

        return $result;
    }
}
