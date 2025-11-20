<?php
class Rechteck
{
  //Attribute
  public $seiteA;
  public $seiteB;
  public $farbe;
  
  
  
  //Eigenschaften
  public function showUmfang()
  {
    $ergebnis=0.0;
    $ergebnis=2*($this->seiteA+$this->seiteB);
    echo "<p>Ausgabe des Umfangs:".$ergebnis."</p>";  
  
  }
  public function showFlaeche()
  {
    $ergebnis=0.0;
    $ergebnis=$this->seiteA*$this->seiteB;
    echo "<p>Ausgabe der Flaeche: ".$ergebnis."</p>";
	 echo "<p>Die Farbe ist: ".$this->farbe."</p>";
  
  }



}
?>