<?php

require_once __DIR__ . "/Artikel.php";


class Aktoren extends Artikel
{
    private string $energieform;

    public function __construct(int $nr, string $bez, int $best, string $ef)
    {
        parent::__construct($nr, $bez, $best);
        $this->energieform = $ef;
    }
}

?>