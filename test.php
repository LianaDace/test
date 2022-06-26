<?php

$board = [
    ["-","-","-","-","-"],
    ["-","-","-","-","-"],
    ["-","-","-","-","-"]
];


function displayBoard(array $board): void
{
    print_r(" | {$board[0][0]} | {$board[0][1]} | {$board[0][2]} | {$board[0][3]} | {$board[0][4]} | \n ");
    print_r("--------------------- \n" );
    print_r(" | {$board[1][0]} | {$board[1][1]} | {$board[1][2]} | {$board[1][3]} | {$board[1][4]} | \n ");
    print_r("--------------------- \n" );
    print_r(" | {$board[2][0]} | {$board[2][1]} | {$board[2][2]} | {$board[2][3]} | {$board[2][4]} | \n ");
}

$symbols = [
    "A", "A", "A", "A", "A",
    "B", "B", "B", "B",
    "C", "C", "C"

];

$i = 0;

while($i < 1) {

    for ($i = 0; $i < count($board); $i++) {

        for ($j = 0; $j < count($board[$i]); $j++) {
            $index = shuffle($symbols);
            $board[$i][$j] = $symbols[$index];
        }
    }

    displayBoard($board);

    $i++;
}


/*
$diagonal1 = $board[0][0] . $board[1][1] . $board[2][2] . $board[1][3] . $board[0][4];
$diagonal2 = $board[2][0] . $board[1][1] . $board[0][2] . $board[1][3] . $board[2][4];

$winLines = [
    $payLine1 = $board[0],
    $payLine2 = $board[1],
    $payLine3 = $board[2],
    $payLine4 = str_split($diagonal1),
    $payLine5 = str_split($diagonal2),
];

*/
//var_dump($winLines);


function firstLine($board){

$payLine1 = $board[0];
$length = count($payLine1);
$storeMatchesCount = [];
$storeFirstSymbol = [];
$toStr = implode($storeFirstSymbol);
$firstChar = substr($toStr, 0, 1);

for ($i = 0; $i < $length; $i++) {

    if ($payLine1[0] != $payLine1[$i]) {
        break;
    } else {
        $storeFirstSymbol[] = $payLine1[0];

    }

}

$toStr = implode($storeFirstSymbol);
$symbolCount = strlen($toStr);
$firstChar = substr($toStr, 0, 1);

if ($symbolCount >= 3) {
    if ($firstChar == "A") {
        echo "Line 1 - You won " . 0.5 * $symbolCount * 2 . "coins!". PHP_EOL;
    }
    if ($firstChar == "B") {
        echo "Line 1 - You won " . 0.5 * $symbolCount * 3 . "coins!". PHP_EOL;
    }
    if ($firstChar == "C") {
        echo "Line 1 - You won " . 0.5 * $symbolCount * 4 . "coins!". PHP_EOL;
    }
}
}

function secondLine($board)
{

    $payLine2 = $board[1];
    $length = count($payLine2);
    $storeMatchesCount = [];
    $storeFirstSymbol = [];
    $toStr = implode($storeFirstSymbol);
    $firstChar = substr($toStr, 0, 1);

    for ($i = 0; $i < $length; $i++) {

        if ($payLine2[0] != $payLine2[$i]) {
            break;
        } else {
            $storeFirstSymbol[] = $payLine2[0];

        }

    }

    $toStr = implode($storeFirstSymbol);
    $symbolCount = strlen($toStr);
    $firstChar = substr($toStr, 0, 1);

    if ($symbolCount >= 3) {
        if ($firstChar == "A") {
            echo "Line 2 - You won " . 0.5 * $symbolCount * 2 . "coins" . PHP_EOL;
            if ($firstChar == "B") {
                echo "Line 2 - You won " . 0.5 * $symbolCount * 3 . "coins" . PHP_EOL;
            }
            if ($firstChar == "C") {
                echo "Line 2 - You won " . 0.5 * $symbolCount * 4 . "coins" . PHP_EOL;
            }
        }
    }
}

function thirdLine($board){

    $payLine3 = $board[2];
    $length = count($payLine3);
    $storeMatchesCount = [];
    $storeFirstSymbol = [];
    $toStr = implode($storeFirstSymbol);
    $firstChar = substr($toStr, 0, 1);

    for ($i = 0; $i < $length; $i++) {

        if ($payLine3[0] != $payLine3[$i]) {
            break;
        } else {
            $storeFirstSymbol[] = $payLine3[0];

        }

    }

    $toStr = implode($storeFirstSymbol);
    $symbolCount = strlen($toStr);
    $firstChar = substr($toStr, 0, 1);

    if ($symbolCount >= 3) {
        if ($firstChar == "A") {
            echo "Line 3 - You won " . 0.5 * $symbolCount * 2 . "coins". PHP_EOL;
        }
        if ($firstChar == "B") {
            echo "Line 3 - You won " . 0.5 * $symbolCount * 3 . "coins". PHP_EOL;
        }
        if ($firstChar == "C") {
            echo "Line 3 - You won " . 0.5 * $symbolCount * 4 . "coins". PHP_EOL;
        }
    }
}

function fourthLine($board){
    $diagonal1 = $board[0][0] . $board[1][1] . $board[2][2] . $board[1][3] . $board[0][4];
    $payLine4 = str_split($diagonal1);
    $payLine3 = $board[2];
    $length = count($payLine3);
    $storeMatchesCount = [];
    $storeFirstSymbol = [];
    $toStr = implode($storeFirstSymbol);
    $firstChar = substr($toStr, 0, 1);

    for ($i = 0; $i < $length; $i++) {

        if ($payLine4[0] != $payLine4[$i]) {
            break;
        } else {
            $storeFirstSymbol[] = $payLine4[0];

        }

    }

    $toStr = implode($storeFirstSymbol);
    $symbolCount = strlen($toStr);
    $firstChar = substr($toStr, 0, 1);

    if ($symbolCount >= 3) {
        if ($firstChar == "A") {
            echo "Line 1/upward " ."V" ." You won " . 0.5 * $symbolCount * 2 . "coins". PHP_EOL;
        }
        if ($firstChar == "B") {
            echo "Line 1/upward " ."V" ." You won " . 0.5 * $symbolCount * 3 . "coins". PHP_EOL;
        }
        if ($firstChar == "C") {
            echo "Line 1/upward " ."V" ." You won " . 0.5 * $symbolCount * 4 . "coins". PHP_EOL;
        }
    }
}

function fifthLine($board){
    $diagonal2 = $board[2][0] . $board[1][1] . $board[0][2] . $board[1][3] . $board[2][4];
    $payLine5 = str_split($diagonal2);
    $payLine3 = $board[2];
    $length = count($payLine3);
    $storeMatchesCount = [];
    $storeFirstSymbol = [];
    $toStr = implode($storeFirstSymbol);
    $firstChar = substr($toStr, 0, 1);

    for ($i = 0; $i < $length; $i++) {

        if ($payLine5[0] != $payLine5[$i]) {
            break;
        } else {
            $storeFirstSymbol[] = $payLine5[0];

        }

    }

    $toStr = implode($storeFirstSymbol);
    $symbolCount = strlen($toStr);
    $firstChar = substr($toStr, 0, 1);

    if ($symbolCount >= 3) {
        if ($firstChar == "A") {
            echo "Line 1/downward " ."V" ." You won " . 0.5 * $symbolCount * 2 . "coins". PHP_EOL;
        }
        if ($firstChar == "B") {
            echo "Line 1/downward " ."V" ." You won " . 0.5 * $symbolCount * 3 . "coins". PHP_EOL;
        }
        if ($firstChar == "C") {
            echo "YLine 1/downward " ."V" ." You won " . 0.5 * $symbolCount * 4 . "coins". PHP_EOL;
        }
    }
}




firstLine($board);
secondLine($board);
thirdLine($board);
fourthLine($board);
fifthLine($board);
//AAA = 3 AAAA = 4 AAAAA = 5
//BBB = 4.5 BBBB = 6 BBBBB = 7.5
//CCC = 6 CCCC = 8 CCCCC = 10


