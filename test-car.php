<?php

class Car
{
    private FuelGauge $fuelGauge;

    public function __construct()
    {
        $this->fuelGauge = new FuelGauge(readline("Add max volume "));
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
                    return $this->currentLevel = $addFuel;
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

}

$car = new Car();
$car->getCurrentLevel();
$car->fillTank();
$car->getCurrentLevel();

