<?php

require_once __DIR__ . "/Artikel.php";

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

?>