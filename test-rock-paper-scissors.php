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
            $winner = [];
            $loser = [];

            while (empty($winner)) {


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
                    $winner[] = $player1->getName();
                    $loser[] = $player2->getName();
                }
                if($player2->getScore() == 2){
                    $winner[] = $player2->getName();
                    $loser[] = $player1->getName();
                }
            }

            echo implode(" ", $winner) . " WIN!" . PHP_EOL;
            echo implode(" ", $loser) . " LOSE" . PHP_EOL;


    }


    public function showElements(): void
    {
        foreach ($this->elements as $key => $element){
            echo "[$key] : {$element->getName()}" . PHP_EOL;
        }
    }
}

class Tournament
{

    private Player $winner = [];

    public function __construct()
    {
       
    }


    public function printTable(Game $winner)
    {
        
    }

    public function start()
    {

    }

}



$game = new Game();
$game->play();





/*
$player1 = new Player("Anna");
var_dump($player1->getScore());
$player1->setScore();
var_dump($player1->getScore());
*/





