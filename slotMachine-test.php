<?php

//Strādā ar phpstrom project - "test"

namespace app;

require("Machine.php");
require ("Player.php");

class Game extends Machine
{

    private Player $player;

    public function __construct()
    {
        parent::__construct();
        $this->test = [];
        $this->rows = [];
    }

    public function play()
    {
        $player = new Player();

        $this->test = [];
        foreach($this->getLines() as $value)
        {
            $this->test[] = $value;
        }

        foreach($this->test as $chars) {

            $count = 0;
            $firstChar = $chars[0];
            var_dump($chars);

            for($i = 0; $i < count($this->getLines()); $i++)
               if($firstChar != str_split($chars)[$i]){
                   break;
               }else {
                   $count++;
               }

            }

            if($count >= 3){
                //  $prize = $prize + $perItem + ($credits[$getFirstChar] * $count) + $koef;
                // $playerTotal = $playerTotal + $prize;
                 echo  "Win: " . $count . $firstChar  . PHP_EOL;
            }

        }




}


$test = new Game();
$i = 0;
while($i < 1) {
    $test->rows();
    $test->drawBoard();
    $test->winLines();
    $test->play();
    $i++;
}





