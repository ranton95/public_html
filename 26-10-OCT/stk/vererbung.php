<?php

class Person
{
    private string $nachname;
    private string $vorname;

    public function __construct(string $nn, string $vn)
    {
        $this->nachname = $nn;
        $this->vorname = $vn;
    }
}

class Lehrer extends Person
{
    private string $email;

    public function __construct(string $nn, string $vn, string $em)
    {
        parent::__construct($nn, $vn); // Aufruf des Elternkonstruktors
        $this->email = $em;
    }

    public function kennung()
    {
        echo "{$this->vorname}, {$this->nachname} ist ein Lehrer";
    }
}

class Schueler extends Person
{

    public function __construct(string $nn, string $vn)
    {
        parent::__construct($nn, $vn); // Aufruf des Elternkonstruktors
        $this->email = $em;
    }

    public function kennung()
    {
        echo "{$this->vorname}, {$this->nachname} ist ein Schueler";
    }
}

//object anzeigen
$angie = new Lehrer("Merkel", "Angie");
$freddy = new Schueler("Merz", "Freddy");

$angie->kennung();
$freddy->kennung();

?>