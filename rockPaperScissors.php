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
    private Element $selection;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName()
    {
        return $this->name;
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

    public function __construct()
    {
        $this->setUp();
    }

    public function setUp()
    {
        $this->elements = [
            $rock = new Element("rock"),
            $paper = new Element("paper"),
            $scissors = new Element("scissors"),
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

        $player1->setSelection($this->elements[(int)readline("Select element ")]);
        $player2->setSelection($this->elements[(int)readline("Select element ")]);

        if($player1->getSelection() === $player2->getSelection()){
            echo "TIE!" . PHP_EOL;
            exit;
        }
        if($player1->getSelection()->isWeakAgainst($player2->getSelection())){
            echo "Player2 WIN!" . PHP_EOL;
        }else{
            echo "Player1 WIN!" . PHP_EOL;
        }



    }

    public function showElements(): void
    {
        foreach ($this->elements as $key => $element){
            echo "{[$key]} : {$element->getName()}" . PHP_EOL;
        }
    }
}

$game = new Game();
$game->play();
