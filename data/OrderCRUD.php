<?php
require_once("DBconfig.php");
require_once("entities/Order.php");

/**
 *
 */
class orderCRUD
{

    public function getAll(){
      $lijst=array();
      if (isset($_COOKIE['basket'])) {
      $rawCookie=$_COOKIE['basket'];
      $basket=json_decode($rawCookie,true);
      foreach ($basket as $rij) {
      $order=Order::create($rij["productID"],$rij["productName"],$rij["price"],$rij["amount"]);
      array_push($lijst,$order);
    }
    }
    return $lijst;
  }

    public function insertOrderAndReturnID($userId){
            $date=date("Y-m-d H:i:s");
            $sql="INSERT INTO finalOrder (user_id,datumTijd) VALUES (:userID,:Dtime)";
            $inst=DB::connect()->prepare($sql);
            $inst->execute(array(':userID'=>$userId,':Dtime'=>$date));
            $id = DB::connect()->lastInsertId();
            $inst=null;
            return $id;
    }

    public function insertOrderline($productId,$amount,$orderID){
      $sql="INSERT INTO orderdetail (order_id,product_id,hoeveelheid) VALUES (:order_id,:product_id,:hoeveelheid)";
      $inst=DB::connect()->prepare($sql);
      $inst->execute(array(':order_id'=>$orderID,':product_id'=>$productId,":hoeveelheid"=>$amount));
      $inst=null;
    }




}
