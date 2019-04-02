<?php

require_once("data/OrderCRUD.php");

/**
 *
 */
class OrderService
{

    public function getAllOrders() {
            $orderR= new orderCRUD;
            $lijst = $orderR->getAll();
            return $lijst;
    }

    public function sendOrder($order,$userID){

        $orderCRUD=new OrderCRUD();
        $orderID=$orderCRUD->insertOrderAndReturnID($userID);

      foreach ($order as $orderline ) {
          $productId=$orderline->getId();
          $amount=$orderline->getAmount();
          $orderC=new OrderCRUD();
          $orderC->insertOrderline($productId,$amount,$orderID);
        }
        //delete cookies
        setcookie("basket",'',time()-3600);
        setcookie("loginUser",'',time()-3600);
        header("Location: index.php");
        exit(0);
    }
}
