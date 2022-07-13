<?php

class Game
{
        private array $rows = [];
        private array $symbols = [];

    public function __construct()
    {
        $this->rows = [];
        $this->arr = [];
        $this->symbols = [];
       $this->line1 = [];
        $this->line2 = [];
        $this->line3 = [];
        $this->line4 = [];
        $this->line5 = [];
        $this->lines = [];

    }
    public function symbols()
    {
        return $this->symbols = ["A","B","C"];
    }

    public function rows()//: void
    {
        $n = count($this->symbols());
        $this->rows = [];

        for($i = 0; $i < 3; $i++){
            for ($j = 0; $j < 5; $j++){
                $index = rand(0, $n-1);
                $this->rows[] = $this->symbols[$index];

            }
        }

        $first = $this->rows[0];
        $winning = 0;
        for($i = 0; $i < 5; $i++){
            if($first !== $this->rows[$i]){
                break;
            }else{
                $winning++;
            }
        }

        return $this->rows;

    }

    public function drawBoard(): void
    {
        echo "| {$this->rows[0]} | {$this->rows[1]} | {$this->rows[2]} | {$this->rows[3]} | {$this->rows[4]} |" . PHP_EOL;
        echo "----+---+---+---+----\n";
        echo "| {$this->rows[5]} | {$this->rows[6]} | {$this->rows[7]} | {$this->rows[8]} | {$this->rows[9]} |" . PHP_EOL;
        echo "----+---+---+---+----\n";
        echo "| {$this->rows[10]} | {$this->rows[11]} | {$this->rows[12]} | {$this->rows[13]} | {$this->rows[14]} |" . PHP_EOL;
    }

    public function winLines()
    {
        $this->lines = [
        $this->line1 = [$this->rows[0], $this->rows[1],$this->rows[2], $this->rows[3], $this->rows[4]],
        $this->line2 = [$this->rows[5], $this->rows[6],$this->rows[7], $this->rows[8], $this->rows[9]],
        $this->line3 = [$this->rows[10], $this->rows[11],$this->rows[12], $this->rows[13], $this->rows[14]],
        $this->line4 = [$this->rows[0],$this->rows[6],$this->rows[12],$this->rows[8],$this->rows[4]],
        $this->line5 = [$this->rows[10],$this->rows[6],$this->rows[2],$this->rows[13],$this->rows[14]],
        ];
    return $this->lines;
    }

    public function getLines()
    {
        $getLine = [];
        foreach($this->lines as $line){
            $getLine[] = implode($line);
        }
        return $getLine;
    }

}

class Test extends Game
{
    private array $test = [];

    public function __construct()
    {
        parent::__construct();
        $this->test = [];
    }

    public function getFirstChar()
    {
        $this->test = [];
        foreach($this->getLines() as $value)
        {
            $this->test[] = $value;
        }

        $firstChar = [];
        $count = 0;
        foreach($this->test as $chars) {
            $firstChar[] = $chars[0] . PHP_EOL;
            for($i = 0; $i < count($this->test); $i++){
                $count++;
            }
        }
echo $count;
        return $firstChar;

    }





}

$test = new Test();
$test->rows();
$test->drawBoard();
$test->winLines();
$test->getFirstChar();






