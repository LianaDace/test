<?php

//Strādā ar phpstrom project - "test"

namespace app;

require("Machine.php");
//require ("Player.php");

class Game extends Machine
{

    //private Player $player;
    private array $prize;

    public function __construct()
    {
        parent::__construct();
        $this->test = [];
        $this->rows = [];
        $this->prize = [];
    }

   public function prize()
   {
        $this->prize = [
           "A" => 1,
           "B" => 2,
           "C" => 3,

       ];
        return $this->prize;
   }

    public function play()
    {
       // $player = new Player();

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

            if($count >= 3){
              
                echo "You win: " . $this->prize()[$firstChar] * $count . " coins". PHP_EOL;
                //  $prize = $prize + $perItem + ($credits[$getFirstChar] * $count) + $koef;
                // $playerTotal = $playerTotal + $prize;
               // echo $this->prize[$firstChar] * $count . PHP_EOL;
                echo  "Win: " . $count . $firstChar  . PHP_EOL;
            }



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

