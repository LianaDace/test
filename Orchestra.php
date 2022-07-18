interface Participant
{
    public function play();
}

abstract class Musician
{
    private string $name;
    private string $instrument;

    public function __construct(string $name, string $instrument)
    {
        $this->name = $name;
        $this->instrument = $instrument;
    }

    public function getInstrument(): string
    {
        return $this->instrument;
    }

    public function getName(): string
    {
        return $this->name;
    }
}


class KeyboardPlayer extends Musician implements Participant
{

    public function play()
    {
        echo $this->getName() . " is playing " . $this->getInstrument(). PHP_EOL;
    }
}


class StringsPlayer extends Musician implements Participant
{

    public function play()
    {
        echo $this->getName() . " is playing " . $this->getInstrument(). PHP_EOL;
    }
}

class WoodwindPlayer extends Musician implements Participant
{

    public function play()
    {
        echo $this->getName() . " is playing " . $this->getInstrument(). PHP_EOL;
    }
}

class Orchestra
{
    private array $musicians;

    public function __construct(array $musicians)
    {
        foreach ($musicians as $musician){
            if($musician instanceof Participant)
            {
                $this->add($musician);
            }
        }
    }

    private function add(Participant $musician)
    {
        $this->musicians[] = $musician;
    }

    public function playConcert()
    {
        foreach ($this->musicians as $musician){
            $musician->play();
        }

    }


}


$orchestra = new Orchestra([
    new KeyboardPlayer("Akville", "Piano"),
    new StringsPlayer("Lielbata", "Violin"),
    new StringsPlayer("Alla", "Cello"),
    new WoodwindPlayer("Balla", "Flute")
    ]);
$orchestra->playConcert();
