<?php
require_once("DBconfig.php");
require_once("entities/Pizza.php");
/**
 *
 */
class PizzaCRUD
{
  public function getAll() {
      $sql = "select product_id,naam,omschrijving,prijs,afbeelding from product";
      $inst=DB::connect();
      $resultSet = $inst->query($sql);
      $lijst = array();
      foreach ($resultSet as $rij) {
        $pizza=Pizza::create($rij["product_id"], $rij["naam"],$rij["omschrijving"],$rij["prijs"], $rij["afbeelding"]);
        array_push($lijst,$pizza);
      }
      $inst = null;
      return $lijst;
      }

}
