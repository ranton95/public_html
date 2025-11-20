<?php
class Konto
{

  //Attribute
  public $iban;
  public $kontoInhaber;
  public $kontoStand;
  public $disopRahmen;
  
  public function __construct(string $iban, string $kontoInhaber, float $kontoStand, float $disopRahmen)
  {
    $this->iban = $iban;
    $this->kontoInhaber= $kontoInhaber;
    $this->kontoStand = $kontoStand;
    $this->disopRahmen = $disopRahmen;
  }

  // Set-Methoden 
  public function Konto(string $iban, string $inhaber, float $dispo){
    $this
    
  }


  public function setDipoRahem(float $dispo){

  }

  
  public function getIban( ):string{
    return $this->iban;
  }

  public function getKontoInhaber( ):string{
    return $this->kontoInhaber;
  }

  public function getDispoRahmen( ):float{
    return $this->disopRahmen;
  }

  public function einzahlen( float $betrag ){
    //deposit

  }

  public function auszahlen( float $betrag ){
    //withdraw
  }

  
  public function ausgeben( ){
    //print the log
    $ergebnisIBAN = $this->getIban();
    $ergebnisKontoInhaber = $this->getKontoInhaber();
    $ergebnisDisporahmen = $this->getDispoRahmen();
    $ergebnisKontostand = $this->getIban();

    echo "<p>Iban: ".$ergebnisIBAN."</p>";
	  echo "<p>Kontoinhaber: ".$ergebnisKontoInhaber."</p>";
    echo "<p>Disporahmen: ".$ergebnisDisporahmen."</p>";
    echo "<p>Kontostand: ".$ergebnisKontostand."</p>";
  }




}
?>