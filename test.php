<?php
$board = [
    ["-","-","-","-","-"],

];

function displayBoard($board)
{
    echo " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} | {$board[0][3]} | {$board[0][4]} \n";
}

function winBig(array $board, $symbol): bool{
    if($board[0][0] === $symbol && $board[0][1] === $symbol && $board[0][2] === $symbol
        && $board[0][3] === $symbol && $board[0][4] === $symbol){
        return true;
    }

    return false;
}

$simb = ["A", "B"];
if(winBig($board, $simb) === true){
    echo "You WON 100!" . PHP_EOL;
}

if($board[0][0]){
    $index = shuffle($simb);
    $board[0][0] = $simb[$index];
}
if($board[0][1]){
    $index = shuffle($simb);
    $board[0][1] = $simb[$index];
}
if($board[0][2]){
    $index = shuffle($simb);
    $board[0][2] = $simb[$index];
}
if($board[0][3]){
    $index = shuffle($simb);
    $board[0][3] = $simb[$index];
}
if($board[0][4]){
    $index = shuffle($simb);
    $board[0][4] = $simb[$index];
}
foreach ($board as $value){
    if($value[0] === $value[1] && $value[1] === $value[2] ||
        $value[1] === $value[2] && $value[2] === $value[3] ||
        $value[2] === $value[3] && $value[3] === $value[4]) {
        echo "WIN!";
    }
}

displayBoard($board);
