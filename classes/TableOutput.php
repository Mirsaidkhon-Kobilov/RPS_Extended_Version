<?php

namespace Classes;

class TableOutput
{
    public static function displayError($error)
    {
        $error
            ->addRow()
            ->addColumn(
                "Please try again and enter an odd number of unique moves to start the game."
            )
            ->display();
    }

    public static function displayGameName($name)
    {
        $name
            ->addRow()
            ->addColumn("Rock, Paper, Scissors: Extended Version")
            ->display();
    }

    public static function displayHelpTable($moves, $table)
    {
        $table->addHeader("v PC\User >");
        for ($i = 0; $i < Move::$movesCount; $i++) {
            $table->addHeader(Move::$moves[$i]);
        }
        $table->addRow();
        for ($i = 0; $i < Move::$movesCount; $i++) {
            $table->addRow()->addColumn(Move::$moves[$i]);
            for ($j = 0; $j < Move::$movesCount; $j++) {
                $result = Winner::countResult(
                    $j + 1,
                    $i + 1,
                    Move::$movesCount
                );
                if ($result > 0) {
                    $result = "Win";
                } elseif ($result < 0) {
                    $result = "Lose";
                } else {
                    $result = "Draw";
                }
                $table->addColumn($result);
            }
            if ($i < Move::$movesCount - 1) {
                $table->addBorderLine();
            }
        }
        $table->display();
    }
}