<?php
require_once 'business/UserService.php';
require_once 'Exceptions/Err.php';
session_start();

function sanTags($x){
  $x=strip_tags($x);
  return $x;
}

function sanString($x){
  $x=strip_tags($x);
  $x=ucfirst(strtolower($x));
  return $x;
}

function sanPhone($x){
    $x=strip_tags($x);
    $x=preg_replace('/[^0-9]/', '', $x);
    return $x;
}

if (isset($_POST['loginSubmit'])) {
    $mail=sanTags($_POST['loginMail']);
    $pass=sanTags($_POST['loginpassword']);
    $login=new UserService;
    $login->loginUser($mail,$pass);
}


if (isset($_POST['registerSubmit'])) {
    $mail=sanTags($_POST['registerMail']);
    $naam=sanString($_POST['name']);
    $voornaam=sanString($_POST['firstName']);
    $adres=sanString($_POST['adres']);
    $huisnummer=sanTags($_POST['houseNumber']);
    $postcode=sanTags($_POST['postalCode']);
    $plaats=sanString($_POST['city']);
    $tel=sanPhone($_POST['telephone']);
    $pass=sanTags($_POST['firstPassword']);
    $pass2=sanTags($_POST['secondPassword']);

    $register=new UserService;
    $register->registerUser($mail,$naam,$voornaam,$adres,$huisnummer,$postcode,$plaats,$tel,$pass,$pass2);
    header("Location: login.php");
    exit(0);
}


include("presentation/loginHTML.php");
