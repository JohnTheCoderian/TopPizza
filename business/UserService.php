<?php

require_once("data/UserCRUD.php");
require_once("entities/User.php");
require_once("business/ValidateRegister.php");
/**
 *
 */
class UserService
{

  public function getUser() {
          $userR= new userCRUD();
          $user = $userR->getUserInfo();
          return $user;
  }


  public function loginUser($mail,$pass){
      $userR=new UserCRUD;
      $user=$userR->getLogin($mail,$pass);
      if (empty($user)) {
        header("Location: login.php?err=invalidLog");
        exit(0);
      }else{
        setcookie("mailUser",$mail);
        setcookie("loginUser","$user");
        header("Location: afrekenen.php");
        exit(0);
      }
  }

  public function registerUser($mail,$naam,$voornaam,$adres,$huisnummer,$postcode,$plaats,$tel,$pass,$pass2){
    $val=new ValidateRegister;
    $val->validateEmail($mail);
    $val->validateFullName($naam,$voornaam);
    $val->validateadres($adres,$huisnummer,$postcode,$plaats);
    $val->validatePhone($tel);
    $val->validatePasswords($pass,$pass2);
    $userC=new UserCRUD;
    $userC->insertUser($mail,$naam,$voornaam,$adres,$huisnummer,$postcode,$plaats,$tel,$pass);

    //na succesvolle register->naar afrekenen
    $this->loginUser($mail,$pass);
  }

}
