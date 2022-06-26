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
    //"C", "C", "C",
    //"X", "X",
    //"7",
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


$diagonal1 = $board[0][0] . $board[1][1] . $board[2][2] . $board[1][3] . $board[0][4];
$diagonal2 = $board[2][0] . $board[1][1] . $board[0][2] . $board[1][3] . $board[2][4];

$winLines = [
    $payLine1 = $board[0],
    $payLine2 = $board[1],
    $payLine3 = $board[2],
    $payLine4 = str_split($diagonal1),
    $payLine5 = str_split($diagonal2),
];

//var_dump($winLines);



$length = count($payLine5);
$storeMatchesCount = [];
$storeFirstSymbol = [];
$toStr = implode($storeFirstSymbol);
$firstChar =  substr($toStr, 0, 1);

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

if($symbolCount >= 3){
    if($firstChar == "A"){
        echo "You won " . 0.5 * $symbolCount * 2 . PHP_EOL;
    }
    if($firstChar == "B"){
        echo "You won " . 0.5 * $symbolCount * 3 . PHP_EOL;
    }
    if($firstChar == "C"){
        echo "You won " . 0.5 * $symbolCount * 4 . PHP_EOL;
    }
}

//AAA = 3 AAAA = 4 AAAAA = 5
//BBB = 4.5 BBBB = 6 BBBBB = 7.5
//CCC = 6 CCCC = 8 CCCCC = 10


