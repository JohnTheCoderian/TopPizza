<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to Pizza Palace!</title>
<link rel="stylesheet" type="text/css" href="presentation/assets/css/master.css"></link>
</head>

<body>
      <header class="mainHeader">
          <a href="index.php" class="logo">Pizza Palace</a>
          <nav class="headerRight">
              <button class="logout">log out</button>
              <span class="basketbtn">winkelmandje</span>
          </nav>
      </header>
  <div class="pizzaContainer">
      <h1 class="selectionHeader">Onze selectie aan top pizza's!</h1>
    <div class="pizzaList">
      <?php foreach ($allePizza as $pizza) {
      echo'<div class="pizzaCard" id="'.$pizza->getId().'">
              <div class="pizzaImage">
                <img src="presentation/assets/images/'.$pizza->getAfbeelding().'" alt="'.$pizza->getAfbeelding().'">
              </div>
                <h2 class="pizzaNaam">'.$pizza->getNaam().'</h2>
                <p class="pizzaPrijs" >€'.$pizza->getPrijs().'</p>
                <p class="pizzaBeschrijving">'.$pizza->getOmschrijving().'</p>
              <button type="button" id="addToBasket">VOEG TOE</button>
        </div>
      ';}?>
    </div>
  </div>

  <div class="basketPanel" style="transform: translateX(100%)">
      <div class="headerCart">
        <h2>Uw bestelling</h2>
        <button class="cartClose">×</button>
      </div>
      <div class="cartList">
        <ul class="cartLineItems">
        </ul>
      </div>
      <div class="cartFooter">
        <div class="cartTotal">
          <span>Totaal:</span>
          <span></span>
        </div>
        <button type="button" id="clearBasket">Wis mandje</button>
        <a href="afrekenen.php"class="checkoutBtn">Afrekenen</a>
      </div>
  </div>
  <script type="text/javascript" src="presentation/assets/js/cookiefr.js"></script>
  <script type="text/javascript" src="presentation/assets/js/basket.js"></script>
  <script type="text/javascript" src="presentation/assets/js/main.js"></script>
</body>
</html>
