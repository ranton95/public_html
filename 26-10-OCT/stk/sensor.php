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

class Sensoren extends Artikel
{
    private string $eingangssignal;
    private string $ausgangssignal;

    public function __construct(
        int $nr,
        string $bez,
        int $best,
        int $es,
        string $as
    ) {
        parent::__construct($nr, $bez, $best);

        $this->eingangssignal = match ($es) {
            1 => "Thermisch",
            2 => "Chemisch",
            3 => "Mechanisch",
            4 => "Magnetisch",
            default => throw new InvalidArgumentException(
                "Das Eingangssignal muss zwischen 1 und 4 liegen."
            ),
        };

        if (!in_array($as, ["Analog", "Digital"], true)) {
            throw new InvalidArgumentException(
                "Das Ausgangssignal muss Analog oder Digital sein."
            );
        }

        $this->ausgangssignal = $as;
    }

    public function getEingangssignal(): string
    {
        return $this->eingangssignal;
    }

    public function getAusgangssignal(): string
    {
        return $this->ausgangssignal;
    }

    public function getDaten(): string
    {
        return "ArtikelNr: {$this->artikelNr}\n"
            . "Bezeichnung: {$this->bezeichnung}\n"
            . "Bestand: {$this->bestand}\n"
            . "Eingangssignal: {$this->eingangssignal}\n"
            . "Ausgangssignal: " . strtolower($this->ausgangssignal);
    }
}

class Aktoren extends Artikel
{
    private string $energieform;

    public function __construct(int $nr, string $bez, int $best, string $ef)
    {
        parent::__construct($nr, $bez, $best);
        $this->energieform = $ef;
    }
}
