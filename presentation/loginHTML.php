<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="presentation/assets/css/master.css"></link>
  </head>
  <body>
    <div class="formContainers">
      <div class="loginContainer">
        <h1>login</h1>
        <div class="errorMessage">
          <?php Err::errorLogin() ?>
        </div>
        <form class="" action="login.php" method="post">
          <input type="email" name="loginMail" required value="<?php if (isset($_COOKIE["mailUser"] )) {
            echo $_COOKIE["mailUser"];
          }?>">
          <input type="password" name="loginpassword" required >
          <input type="submit" name="loginSubmit" value="login">
        </form>
      </div>

      <div class="registerContainer">
        <h1>registreer</h1>
        <div class="errorMessage">
          <?php Err::errorRegister() ?>
        </div>
        <form action="login.php" method="post">
          <label for="email">Email:</label>
          <input type="email" name="registerMail" required>
          <label for="name">Naam:</label>
          <input type="text" name="name" required>
          <label for="firstName">Voornaam:</label>
          <input type="text" name="firstName" required>
          <label for="adres">Adres:</label>
          <input type="text" name="adres" required>
          <label for="houseNumber">Huisnummer:</label>
          <input type="number" name="houseNumber" required>
          <label for="postalCode">Postcode:</label>
          <input type="number" name="postalCode" required>
          <label for="city">Plaats:</label>
          <input type="text" name="city" required>
          <label for="telephone">Telefoon/GSM:</label>
          <input type="text" name="telephone" required>
          <label for="firstPassword">wachtwoord:</label>
          <input type="password" name="firstPassword" required>
          <label for="secondPassword">Herhaal wachtwoord:</label>
          <input type="password" name="secondPassword" required>
          <input type="submit" name="registerSubmit" value="Registreer">
        </form>
      </div>
    </div>
  </body>
</html>
