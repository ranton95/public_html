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
}

?>