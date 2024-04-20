<?php

namespace Classes;

class HmacGenerate
{
    private static $hmac;

    public static function generateHmac()
    {
        self::$hmac = hash_hmac('sha3-256', Move::$moves[Move::getPcMove()-1], KeyGenerate::getKey());
    }

    public static function getHmac()
    {
        return self::$hmac;
    }
}