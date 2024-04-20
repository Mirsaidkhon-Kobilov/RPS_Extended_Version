<?php

namespace Classes;

class KeyGenerate
{
    private static $key;

    public static function generateKey()
    {
        self::$key = bin2hex(random_bytes(256));
    }

    public static function getKey()
    {
        return self::$key;
    }
}