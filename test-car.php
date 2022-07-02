<?php

class Car
{
    private FuelGauge $fuelGauge;

    public function __construct()
    {
        $this->fuelGauge = new FuelGauge(readline("Add max volume "));
    }

    public function run()
    {
        while(true) {
            echo "Choose 1 to check fuel volume " . PHP_EOL;
            echo "Choose 2 to fill up tank " . PHP_EOL;
            echo "Choose 3 to check odometer " . PHP_EOL;
            echo "Choose 4 to drive " . PHP_EOL;
            echo "Choose 0 to exit " . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->getCurrentLevel();
                    break;
                case 2:
                    $this->fillTank();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }

    }

    public function getCurrentLevel(): void
    {
        echo "Current level: " . $this->fuelGauge->getCurrentLevel() . " liter" . PHP_EOL;
    }

    public function fillTank(): void
    {
        $this->fuelGauge->addFuel();
    }

}

class FuelGauge
{
    private int $maxLevel;
    private int $currentLevel;

    public function __construct(int $maxLevel)
    {
        $this->maxLevel = $maxLevel;
        $this->currentLevel = 0;
    }

    public function getCurrentLevel(): int
    {
        return $this->currentLevel;
    }

    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

  public function addFuel(): int
  {

    if($this->currentLevel >= 0 && $this->currentLevel <= $this->maxLevel)
    {
        $addFuel = readline("How much would you like to add? ");

            for($i = 0; $i <= $addFuel; $i++)
            {
                if($addFuel <= $this->maxLevel) {
                    return $this->currentLevel = $this->currentLevel + $addFuel;
                }elseif($addFuel > $this->maxLevel){
                    $subtract = bcsub($addFuel, $this->maxLevel);

                    echo "Your max fuel gauge volume is "  . $this->maxLevel . " you tried fill "
                    . $subtract . " liter too much!" . PHP_EOL;
                    return $this->currentLevel = $this->maxLevel;
                }
            }
        }
      return $this->currentLevel = $this->maxLevel;
  }

}

class Odometer
{
    private int $currentMileage;
    private float $maxMileage;

    public function __construct()
    {
        $this->currentMileage = 0;
        $this->maxMileage = 999.999;
    }

    public function getCurrentMileage()
    {
        return $this->currentMileage;
    }

    public function addMileage()
    {

        if($this->currentMileage <= $this->maxMileage){
            $addMileage = readline("How km would you like to drive? ");
            for($i = 0; $i <= $addMileage; $i++){
                return $this->currentMileage = $this->currentMileage + $addMileage;
            }
        }elseif($this->currentMileage > $this->maxMileage){
            return $this->currentMileage = 0;
        }
        return $this->currentMileage;
    }

}

$car = new Car();
$car->run();
$car->getCurrentLevel();
$car->fillTank();
$car->getCurrentLevel();


/*
$car2 = new Odometer();
//$car2->addMileage();
var_dump($car2->addMileage());
var_dump($car2);

var_dump($car2->getCurrentMileage());

*/
