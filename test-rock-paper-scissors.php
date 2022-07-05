<?php

class Element
{
    private string $name;
    private array $weakness = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setWeaknesses(array $elements)
    {
        foreach ($elements as $element){
            if($element instanceof Element) {
                $this->weakness = $elements;
            }
        }
    }

    public function isWeakAgainst(Element $element)
    {
        return in_array($element, $this->weakness);
    }
}

class Player
{
    private string $name;
    private int $score = 0;
    private Element $selection;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName()
    {
        return $this->name;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(): void
    {
       $this->score = $this->score + 1;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSelection(Element $selection): void
    {
        $this->selection = $selection;
    }

    public function getSelection(): Element
    {
        return $this->selection;
    }

}

class Game
{
    /** @var Element[] */
    private array $elements = [];
    /** @var Player */
    private int $score;
    private array $winner = [];
    private array $loser = [];

    public function __construct()
    {
        $this->setUp();
    }

    public function setUp()
    {
        $this->elements = [
           1 => $rock = new Element("rock"),
           2 =>  $paper = new Element("paper"),
           3 => $scissors = new Element("scissors"),
        ];

        $rock->setWeaknesses([$paper]);
        $paper->setWeaknesses([$scissors]);
        $scissors->setWeaknesses([$rock]);
    }


    public function play()
    {

           $player1 = new Player(readline("Set player1 name: "));
           $player2 = new Player(readline("Set player2 name: "));


            $this->showElements();
            $this->winner = [];
            $this->loser = [];

            while (empty($this->winner)) {


                $player1->setSelection($this->elements[(int)readline($player1->getName() . " Select element ")]);
                $player2->setSelection($this->elements[array_rand($this->elements)]);

                if ($player1->getSelection() === $player2->getSelection()) {
                    echo "TIE!" . PHP_EOL; continue;
                }
                if ($player1->getSelection()->isWeakAgainst($player2->getSelection())) {
                    $player2->setScore();
                    echo $player2->getName() . " WIN! Score: " . $player2->getScore() . PHP_EOL;
                } else {
                    $player1->setScore();
                    echo $player1->getName() . " WIN! Score: " . $player1->getScore() . PHP_EOL;
                }
                if($player1->getScore() == 2){
                    $this->winner[] = $player1->getName();
                    $this->loser[] = $player2->getName();
                }
                if($player2->getScore() == 2){
                    $this->winner[] = $player2->getName();
                    $this->loser[] = $player1->getName();
                }
            }

            echo implode(" ", $this->winner) . " WIN!" . PHP_EOL;
            echo implode(" ", $this->loser) . " LOSE" . PHP_EOL;


    }


    public function showElements(): void
    {
        foreach ($this->elements as $key => $element){
            echo "[$key] : {$element->getName()}" . PHP_EOL;
        }
    }

    public function getWinners()
    {
        foreach ($this->winner as $winner){
            return $winner;
        }
    }

    public function getLoser()
    {
        foreach ($this->loser as $loser){
            return $loser;
        }
    }


}

class Tournament
{


    public function __construct()
    {

    }

    public function getPlayers()
    {

    }


    public function getPlayerCount()
    {

    }


    public function runGames()
    {

    }
}


 
/*

$winner = new Tournament();
$winner->getPlayers();
$winner->getPlayerCount();
$winner->runGames();

 */


$game1 = new Game();
$game1->play();
//
//$game2 = new Game();
//$game2->play();
//
echo $game1->getWinners() . " win" . PHP_EOL;
echo $game1->getLoser() . " lose" . PHP_EOL;
//$game2->getWinners();





