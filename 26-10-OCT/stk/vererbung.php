<?php

class Person
{
    protected string $nachname;
    protected string $vorname;

    public function __construct(string $nn, string $vn)
    {
        $this->nachname = $nn;
        $this->vorname = $vn;
    }
}

class Lehrer extends Person
{
    public function __construct(string $nn, string $vn)
    {
        parent::__construct($nn, $vn); // Aufruf des Elternkonstruktors
    }

    public function kennung()
    {
        echo "{$this->vorname} {$this->nachname} ist ein Lehrer";
    }
}

class Schueler extends Person
{

    public function __construct(string $nn, string $vn)
    {
        parent::__construct($nn, $vn); // Aufruf des Elternkonstruktors
    }

    public function kennung()
    {
        echo "<p>{$this->vorname}, {$this->nachname} ist ein Schueler</p>";
    }
}

//object anzeigen
$angie = new Lehrer("Merkel", "Angie");
$freddy = new Schueler("Merz", "Freddy");

$pl = new Person("Mustermann", "Max"); //empty person init does not work as the constructor is not with optional attributes

$angie->kennung();
$freddy->kennung();


?>