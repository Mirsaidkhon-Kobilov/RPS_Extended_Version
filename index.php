<?php

use Classes\Move;
use Classes\KeyGenerate;
use Classes\HmacGenerate;
use Classes\TableOutput;
use Classes\Winner;

require "./vendor/autoload.php";

if (Move::checkMoves($argv)) {
    $error = new LucidFrame\Console\ConsoleTable();
    TableOutput::displayError($error);
    exit();
}

Move::setMoves($argv);

while (true) {
    KeyGenerate::generateKey();

    Move::generatePcMove();

    HmacGenerate::generateHmac();

    $name = new LucidFrame\Console\ConsoleTable();
    TableOutput::displayGameName($name);

    Move::showMoves();

    Move::setPlayerMove();

    if (Move::getPlayerMove() == 0) {
        exit();
    } elseif (Move::getPlayerMove() == "?") {
        $table = new LucidFrame\Console\ConsoleTable();
        TableOutput::displayHelpTable(Move::$moves, $table);
    } elseif (
        Move::getPlayerMove() <= Move::$movesCount &&
        Move::getPlayerMove() > 0
    ) {
        Winner::showResult(
            Move::getPlayerMove(),
            Move::getPcMove(),
            Move::$movesCount
        );
        echo "HMAC Key: " . KeyGenerate::getKey() . PHP_EOL;
    } else {
        echo "There is no such move!" . PHP_EOL;
    }

    Move::Continue();
}
