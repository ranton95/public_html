<?php

abstract class Artikel
{
    protected int $artikelNr;
    protected string $bezeichnung;
    protected int $bestand;

    public function __construct(int $nr, string $bez, int $best)
    {
        $this->artikelNr = $nr;
        $this->bezeichnung = $bez;
        $this->bestand = $best;
    }

    public function ausbuchen(int $menge): string
    {
        if ($menge < 0 || $menge > $this->bestand) {
            return "Buchung nicht möglich";
        }

        $this->bestand -= $menge;
        return "Bestand neu: {$this->bestand}";
    }
}

?>