<?php

namespace Classes;

class Move
{
    public static $moves;

    public static $movesCount;

    private static $pcMove;

    private static $playerMove;

    public static function checkMoves(&$argv)
    {
        $argv = array_unique($argv);
        if (count($argv) % 2 == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function setMoves($argv)
    {
        self::$moves = array_slice($argv, 1);
        self::$movesCount = count(self::$moves);
    }

    public static function generatePcMove()
    {
        self::$pcMove = random_int(1, self::$movesCount);
    }

    public static function getPcMove()
    {
        return self::$pcMove;
    }

    public static function showMoves()
    {
        echo "HMAC: " . HmacGenerate::getHmac() . PHP_EOL;
        echo "Available moves:" . PHP_EOL;
        for ($i = 0; $i < self::$movesCount; $i++) {
            echo $i + 1 . " - " . self::$moves[$i] . PHP_EOL;
        }
        echo "? - Help" . PHP_EOL;
        echo "0 - Exit" . PHP_EOL;
        echo "Enter your move number: ";
    }

    public static function setPlayerMove()
    {
        self::$playerMove = trim(fgets(STDIN));
    }

    public static function getPlayerMove()
    {
        return self::$playerMove;
    }

    public static function Continue()
    {
        echo "Press 'ENTER' to return to the selection menu.";
        fgets(STDIN);
    }
}