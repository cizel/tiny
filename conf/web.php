<?php

/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */
return [
    'components' => [
        'log' => [
            'traceLevel' => TINY_DEBUG ? 3 : 0,
            'targets'    => [
                'class'  => 'log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
];