<?php

class Pizza {
  private static $idMap = array();
  private $id;
  private $naam;
  private $omschrijving;
  private $prijs;
  private $afbeelding;

private function __construct($id, $naam, $omschrijving,$prijs,$afbeelding) {
    $this->id = $this->encode($id);
    $this->naam = $naam;
    $this->omschrijving = $omschrijving;
    $this->prijs=$prijs;
    $this->afbeelding=$afbeelding;
    }

public static function create($id, $naam, $omschrijving,$prijs,$afbeelding) {
  if (!isset(self::$idMap[$id])) {
  self::$idMap[$id] = new Pizza($id, $naam, $omschrijving,$prijs,$afbeelding);
  }
  return self::$idMap[$id];
}

public function getId() { return $this->id; }
public function getNaam() { return $this->naam; }
public function getOmschrijving() { return $this->omschrijving; }
public function getPrijs() { return $this->prijs; }
public function getAfbeelding(){return $this->afbeelding;}

private function encode($id){return "prdc".$id;}


}
