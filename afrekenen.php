<?php
require_once("business/OrderService.php");
require_once("business/UserService.php");


session_start();
if (!isset($_COOKIE["loginUser"])) {
  header("Location: login.php");
  exit(0);
}


//FinalOrder
$orderSvc = new OrderService();
$order = $orderSvc-> getAllOrders();

//User
$userS=new UserService();
$user=$userS->getUser();

//send order
if (isset($_POST["sendOrder"])) {
  $userID=$user->getId();
  $orderSvc->sendOrder($order,$userID);
}
//calc tot cart
function total($arr){
  $total=0;
  foreach ($arr as $obj) {
    $total+=$obj->getTotal();
  }
echo $total;
}

include("presentation/afrekenenHTML.php");
