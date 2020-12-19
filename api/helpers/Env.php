<?php

namespace app\helpers;

class Env
{
    public static function get($key, $default = '')
    {
        $value = getenv($key);

        if ($value) {
            return $value;
        }

        return $default;
    }
}