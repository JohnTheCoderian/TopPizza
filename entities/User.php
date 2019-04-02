<?php
/**
 *
 */
class User
{

      private static $idMap = array();
      private $id;
      private $naam;
      private $voornaam;
      private $adres;
      private $huisnummer;
      private $postcode;
      private $plaats;

    private function __construct($id, $naam, $voornaam,$adres,$huisnummer,$postcode,$plaats) {
        $this->id = $id;
        $this->vollNaam =$voornaam.' '.$naam;
        $this->adres=$adres.' '.$huisnummer;
        $this->postcode=$postcode;
        $this->plaats=$plaats;
        }

    public static function create($id, $naam, $voornaam,$adres,$huisnummer,$postcode,$plaats) {
      if (!isset(self::$idMap[$id])) {
      self::$idMap[$id] = new User($id, $naam, $voornaam,$adres,$huisnummer,$postcode,$plaats);
      }
      return self::$idMap[$id];
    }

    public function getId() { return $this->id; }
    public function getFullName() { return $this->vollNaam;}
    public function getAdres() { return $this->adres; }
    public function getPostcode() { return $this->postcode; }
    public function getPlaats(){return $this->plaats;}



  }
