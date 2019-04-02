<?php
class Err
{
    public static function errorLogin(){
      if (isset($_GET['err'])) {
        $signupCheck=$_GET['err'];
        switch ($signupCheck) {
          case 'invalidLog':
            echo "<p>Uw email of wachtwoord is niet correct</p>";
            break;
        }
      }
  }

      public static function errorRegister(){
        if (isset($_GET['err'])) {
          $signupCheck=$_GET['err'];
          switch ($signupCheck) {
            case 'alreadyexist':
              echo "<p>Dit email adres is reeds geregistreerd</p>";
              break;
            case 'invalidemail':
              echo "<p>uw emailadres is ongeldig</p>";
              break;
            case 'nameNAplha':
              echo "<p>Uw naam of voornaam bestaat niet enkel uit letters</p>";
              break;
            case 'numberNega':
              echo "<p>Uw huisnummer kan niet negatief zijn</p>";
              break;
            case 'postUnknown':
              echo "<p>Uw postcode is ongeldig</p>";
              break;
            case 'adresNAplha':
              echo "<p>Uw plaats bestaat niet enkel uit letters</p>";
              break;
            case 'numbrLgth':
              echo "<p>Uw telefoonnummer moet uit 10 cijfers (belgisch) of 11 cijfers (internationaal) bestaan</p>";
              break;
            case 'NsamePass':
              echo "<p>Uw wachtwoorden zijn niet gelijk</p>";
              break;
            case 'pswNAlphaN':
              echo "<p>Uw wachtwoord is niet alfanumeriek (letters &amp; cijfers)</p>";
              break;
            case 'pswNCLngth':
              echo "<p>Uw wachtwoord moet tussen de 4 en 10 karakters zijn </p>";
              break;
          }
        }
    }
  }
