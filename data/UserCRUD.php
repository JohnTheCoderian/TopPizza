<?php
require_once 'DBconfig.php';


  class UserCRUD
  {


    public function getUserInfo(){
      $userID=$_COOKIE["loginUser"];
      $sql= "SELECT user_id,naam,voornaam,adres,huisnummer,postcode,gemeente FROM user JOIN plaats ON user.postcode=plaats.postcode_key WHERE user_id=:userID";
      $inst=DB::connect()->prepare($sql);
      $inst->execute(array(":userID"=>$userID));
      $data=$inst->fetch(PDO::FETCH_ASSOC);
      $user=User::create($data["user_id"], $data["naam"],$data["voornaam"],$data["adres"], $data["huisnummer"], $data["postcode"], $data["gemeente"]);
      $inst=null;
      return $user;
    }


    public function getLogin($mail,$pw){
      $pw=md5($pw);
      $sql="SELECT user_id from user where email=:email AND password=:password";
      $inst=DB::connect()->prepare($sql);
      $inst->execute(array(":email"=>$mail,":password"=>$pw));
      $data=$inst->fetch(PDO::FETCH_ASSOC);
      $inst=null;
      return $data["user_id"];
    }

    public function insertUser($mail,$naam,$voornaam,$adres,$huisnummer,$postcode,$plaats,$tel,$pass){
      $pass=md5($pass);

      //gebruiker gegevens toevoegen
      $prStat=array(':email'=>$mail,'password'=>$pass,':naam'=>$naam,':voornaam'=>$voornaam,':adres'=>$adres,':huisnummer'=>$huisnummer,':postcode'=>$postcode,':tel'=>$tel);
      $sql="INSERT INTO user (email,password,naam,voornaam,adres,huisnummer,postcode,tel) VALUES (:email,:password,:naam,:voornaam,:adres,:huisnummer,:postcode,:tel)";
      $inst=DB::connect()->prepare($sql);
      $inst->execute($prStat);
      $inst=null;

      //plaats toevoegen aan DB als nog niet aanwezig
      $sql="INSERT INTO plaats (postcode_key,gemeente) SELECT :postcode,:gemeente WHERE NOT EXISTS (SELECT * FROM plaats WHERE postcode_key=:postcode)";
      $inst=DB::connect()->prepare($sql);
      $inst->execute(array(':postcode'=>$postcode,':gemeente'=>$plaats));
      $inst=null;
    }

    public function selectMail($mail){
        $sql="SELECT email from user where email=:email";
        $inst=DB::connect()->prepare($sql);
        $inst->execute(array(':email' => $mail));
        $data=$inst->fetch(PDO::FETCH_ASSOC);
        $inst=null;
        return $data['email'];
      }
  }
