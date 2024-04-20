<?php

namespace Classes;

class Winner
{
    public static function countResult($playerMove, $pcMove, $movesCount)
    {
        $half = floor($movesCount / 2);
        $result =
            (($playerMove - $pcMove + $movesCount + $half) % $movesCount) -
            $half;
        return $result;
    }

    public static function showResult($playerMove, $pcMove, $movesCount)
    {
        $result = self::countResult($playerMove, $pcMove, $movesCount);
        echo "Your move: " . Move::$moves[$playerMove - 1] . PHP_EOL;
        echo "PC move: " . Move::$moves[$pcMove - 1] . PHP_EOL;

        if ($result > 0) {
            echo "!!! You Win !!!" . PHP_EOL;
        } elseif ($result < 0) {
            echo ":( You Lose :(" . PHP_EOL;
        } else {
            echo "-- Draw --" . PHP_EOL;
        }
    }
}
