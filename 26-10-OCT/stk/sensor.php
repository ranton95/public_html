<?php

class Artikel
{
    protected int $artikelNr;
    protected string $bezeichnung;
    protected int $bestand;

    public function __construct(int $nr, int $bez, int $best)
    {
        $this->artikelNr = $nn;
        $this->bezeichnung = $bez;
        $this->bestand = $bez;
    }

    public function ausbuchen(int $menge)
    {
        if ( $menge <= $this->bestand){
         $this->bestand = $this->bestand - $menge; 
         echo "Bestnad neu: {$bestand}";
        }else{
         echo "Buchung nicht möglich";
        }
    }
}


class Sensoren extends Artikel
{
    private string $eingansignal;
    private string $ausgangsignal;

    public function __construct(int $nr, int $bez, int $best, int $es, string $as)
    {
        parent::__construct($nr, $bez, $bez); // Aufruf des Elternkonstruktors
        
        if( $es == 1){
            $this->eingansignal = "Thermisch";
        } 
        elseif($es == 2){
             $this->eingansignal = "Chemisch";
        }
        elseif($es == 3){
             $this->eingansignal = "Mechanisch";
        }
        elseif($es == 4){
             $this->eingansignal = "Magnetisch";
        }

        if( $as == 1){
             $this->ausgangsignal = "Analog";
        }
        elseif($as == 2){
             $this->ausgangsignal = "Digital";
        }
       
    }

    public function getEingangssignal()
    {
        echo "{$this->eingangsignal} ist die Eingangsignal";
    }

    public function getAusgangssignal()
    {
        echo "{$this->ausgangsignal} ist die Ausgangsignal";
    }

    public function getDaten()
    {
       echo " {$this->artikelNr} ist die Artikelnummer";
       echo " {$this->bezeichnung} ist die Bezeichnung";
       echo " {$this->bestand} ist die Bestand";
       echo "{$this->eingangsignal} ist die Eingangsignal";
       echo "{$this->ausgangsignal} ist die Ausgangsignal";
    }
    
}

class Aktoren extends Artikel
{

    public function __construct(int $nr, int $bez, int $best, string $ef)
    {
        parent::__construct($nr, $bez, $bez); // Aufruf des Elternkonstruktors
        $this->energiefaktor = $ef;

    }

}

//object anzeigen
$angie = new Lehrer("Merkel", "Angie");
$freddy = new Schueler("Merz", "Freddy");

$pl = new Person("Mustermann", "Max"); //empty person init does not work as the constructor is not with optional attributes

$angie->kennung();
$freddy->kennung();


?>