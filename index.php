<?php

require_once("business/PizzaService.php");
$pizzaSvc = new PizzaService();
$allePizza = $pizzaSvc-> getAllPizza();


include("presentation/indexHTML.php");
