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
    /** @var Player *///
   // private int $score;
   // private const MAX_NUM = 2;
    private Player $player1;
    private Player $player2;

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


    public function play(Player $player1, Player $player2)
    {

      // $player1 = new Player(readline("Set player1 name: "));
      // $player2 = new Player(readline("Set player2 name: "));


        $this->showElements();

        $player1->setSelection($this->elements[(int)readline($player1->getName() . " Select element ")]);
        $player2->setSelection($this->elements[array_rand($this->elements)]);


        if ($player1->getSelection() === $player2->getSelection()) {
            echo "TIE!" . PHP_EOL;
        }
        if ($player1->getSelection()->isWeakAgainst($player2->getSelection())) {
            $player2->setScore();
            $this->winner[] = $player2;
            echo $player2->getName() . " WIN! Score: " . $player2->getScore() . PHP_EOL;
        } else {
            $player1->setScore();
            $this->winner[] = $player1;
            echo $player1->getName() . " WIN! Score: " . $player1->getScore() . PHP_EOL;
        }

    }


    public function showElements(): void
    {
        foreach ($this->elements as $key => $element){
            echo "[$key] : {$element->getName()}" . PHP_EOL;
        }
    }

    public function getWinner()
    {
        foreach ($this->winner as $winner){
            return $winner;
        }
    }


}

$player1 = new Player("Anna");
$player2 = new Player("Panna");
$player3 = new Player("Ilze");
$player4 = new Player("Valdis");
$player5 = new Player("Juris");
$player6 = new Player("Zigfrids");
$player7 = new Player("Mirdza");
$player8 = new Player("Olita");


//----------------------- First round ----------------------

$game1 = new Game();
$game1->play($player1, $player2);

$game2 = new Game();
$game2->play($player3, $player4);

$game3 = new Game();
$game3->play($player5, $player6);

$game4 = new Game();
$game4->play($player7, $player8);

//----------------------- Semi final----------------------

$game5 = new Game();
$game5->play($game1->getWinner(), $game2->getWinner());

$game6 = new Game();
$game6->play($game3->getWinner(), $game4->getWinner());

//----------------------- FINAL ----------------------

$game7 = new Game();
$game7->play($game5->getWinner(), $game6->getWinner());

echo "Tournament finalist is: " . $game7->getWinner()->getName() . PHP_EOL;

