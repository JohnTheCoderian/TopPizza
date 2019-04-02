<?php
/**
 *
 */
class Order
{
  private static $pIdMap = array();
  private $pId;
  private $pNaam;
  private $pPrijs;
  private $pAantal;


  private function __construct($pId,$pNaam,$pPrijs,$pAantal) {
    $this->id = $this->deCode($pId);
    $this->naam = $pNaam;
    $this->prijs=$pPrijs;
    $this->aantal=$pAantal;
    $this->totaal=$pPrijs*$pAantal;
    }

  public static function create($pId,$pNaam,$pPrijs,$pAantal) {
  if (!isset(self::$pIdMap[$pId])) {
  self::$pIdMap[$pId] = new Order($pId,$pNaam,$pPrijs,$pAantal);
  }
  return self::$pIdMap[$pId];
  }

  public function getId() { return $this->id; }
  public function getNaam() { return $this->naam; }
  public function getOmschrijving() { return $this->omschrijving; }
  public function getPrijs() { return $this->prijs; }
  public function getAmount(){return $this->aantal;}
  public function getTotal(){return $this->totaal;}

  private function deCode($pId){return str_replace("prdc","",$pId);}

  }
