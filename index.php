<?php

require "./vendor/autoload.php";

if (Classes\Move::checkMoves($argv)) {
    $error = new LucidFrame\Console\ConsoleTable();
    Classes\TableOutput::displayError($error);
    exit();
}

Classes\Move::setMoves($argv);

while (true) {
    Classes\KeyGenerate::generateKey();

    Classes\Move::generatePcMove();

    Classes\HmacGenerate::generateHmac();

    $name = new LucidFrame\Console\ConsoleTable();
    Classes\TableOutput::displayGameName($name);

    Classes\Move::showMoves();

    Classes\Move::setPlayerMove();

    if (Classes\Move::getPlayerMove() == 0) {
        exit();
    } elseif (Classes\Move::getPlayerMove() == "?") {
        $table = new LucidFrame\Console\ConsoleTable();
        Classes\TableOutput::displayHelpTable(Classes\Move::$moves, $table);
    } elseif ((Classes\Move::getPlayerMove() <= Classes\Move::$movesCount)&&(Classes\Move::getPlayerMove()>0)) {
        Classes\Winner::showResult(
            Classes\Move::getPlayerMove(),
            Classes\Move::getPcMove(),
            Classes\Move::$movesCount
        );
        echo "HMAC Key: " . Classes\KeyGenerate::getKey() . PHP_EOL;
    } else {
        echo "There is no such move!" . PHP_EOL;
    }

    Classes\Move::Continue();
}
