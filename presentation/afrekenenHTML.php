<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>afrekenen</title>
    <link rel="stylesheet" type="text/css" href="presentation/assets/css/master.css"></link>
  </head>
  <body>
    <header>
        <a href="index.php" class="logo">Pizza Palace</a>
        <nav class="headerRight">
            <button class="logout">log out</button>
        </nav>
    </header>
      <div class="orderContainer">
        <h1>Uw overzicht</h1>
        <div class="orderList">
          <?php foreach ($order as $orderLine) {
          echo'<li class="cartItem">
                        <div class="cartContent">
                          <span class="amount">'.$orderLine->getAmount().'x</span>
                          <span class="item">'.$orderLine->getNaam().'</span>
                          <span class="price">€'.$orderLine->getPrijs().'/stuk  </span>
                          <span class="totalPerLine">€'.$orderLine->getTotal().'</span>
                        </div>
              </li>';}?>
      </div>
      <div class="totaal">
        <p class="finalTotal">Het totaal is: €<?php total($order);?></p>

      </div>
    </div>

      <div class="gegevens">
        <h1>Uw gegevens</h1>
            <?php  echo '<div class="persoonsGegevens">
                <p>Naam: '.$user->getFullName().'</p>
                <p>Adres: '.$user->getAdres().'</p>
                <p>Postcode: '.$user->getPostcode().'</p>
                <p>Gemeente: '.$user->getplaats().'</p>
              </div>' ?>
      </div>
      <div class="afrekenen">
        <form class="" action="afrekenen.php" method="post">
            <input type="submit" name="sendOrder" value="Afrekenen">
        </form>

      </div>
        <script type="text/javascript" src="presentation/assets/js/cookiefr.js"></script>
      <script type="text/javascript" src="presentation/assets/js/main.js"></script>
  </body>
</html>
