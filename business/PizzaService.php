<?php
require_once("data/PizzaCRUD.php");

/**
 *
 */
class PizzaService
{

    public function getAllPizza() {
            $pizzaR= new PizzaCRUD();
            $lijst = $pizzaR->getAll();
            return $lijst;
    }


}
