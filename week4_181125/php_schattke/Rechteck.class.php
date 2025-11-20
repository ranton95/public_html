<?php
class Rechteck
{

  //Attribute
  public $seiteA;
  public $seiteB;
  public $farbe;
  
  public function __construct($sA, $sB, $f)
  {
    $this->seiteA = $sA;
    $this->seiteB = $sB;
    $this->farbe = $f;
  }
  
  // Set-Methoden 
  public function setSeiteA($sA){
    //Plaüsibilitätkonrolle
    if($sA<0){$sA*=-1;}
    $this->seiteA=$sA;
  }


  public function setSeiteB($sB){
    $this->seiteB=$sB;
  }

  
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