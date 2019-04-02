<?php
require_once("data/UserCRUD.php");
/**
 *
 */
class ValidateRegister
{

    public function validateEmail($mail){
        $userCRUD=new UserCRUD;
        $checkMail=$userCRUD->selectMail($mail);

        if ($checkMail===$mail) {
          header("Location: login.php?err=alreadyexist");
          exit(0);
        }else if (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
          header("Location: login.php?err=invalidemail");
          exit(0);
        }
      }

    public function validateFullName($nm,$fnm){
        if (preg_match('/[^A-Za-z]/',$nm)||preg_match('/[^A-Za-z]/',$fnm)) {
          header("Location: login.php?err=nameNAplha");
          exit(0);
        }
      }

    public function validateadres($adres,$huisnummer,$postcode,$plaats){
          if (preg_match('/[^A-Za-z ]/',$adres)) {
            header("Location: login.php?err=adresNAplha");
            exit(0);
          }

          if ($huisnummer<1) {
            header("Location: login.php?err=numberNega");
            exit(0);
          }

          if($postcode<1000||$postcode>9999){
            header("Location: login.php?err=postUnknown");
            exit(0);
          }

          if (preg_match('/[^A-Za-z]/',$plaats)) {
            header("Location: login.php?err=plcNAlpha");
            exit(0);
          }

      }

      public function validatePhone($tel){
        if (strlen($tel)<10||strlen($tel)>11) {
          header("Location: login.php?err=numbrLgth");
          exit(0);
        }

      }

      public function validatePasswords($pw,$pw2){
        if ($pw!==$pw2) {
          header("Location: login.php?err=NsamePass");
          exit(0);
        }

        if (preg_match('/[^A-Za-z0-9]/',$pw)) {
          header("Location: login.php?err=pswNAlphaN");
          exit(0);
        }

        if (strlen($pw)<4||strlen($pw)>10) {
          header("Location: login.php?err=pswNCLngth");
          exit(0);
        }
      }



}
