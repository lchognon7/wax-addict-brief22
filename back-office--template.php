<?php

  @date_default_timezone_set("Europe/Paris"); // fuseau horaire
  @setlocale(LC_TIME, "fr_FR.utf8","fra"); // jours et mois en français
  $dateDuJour = strftime("%A %d %B %Y");

?><!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wax-addict — boutique officielle</title>
  <meta name="description" content="Bienvenue dans la boutique privée “Wax-Addict”. Retrouvez notre toute dernière sélection de tissus africains hauts de gamme.">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet"> 
</head>

<body class="back-office">
  <header><h2>wax-addict</h2></header>
  <main>
    <h2>Bienvenue dans votre espace privé</h2>
    <p class = 'sous-titre'>Voici les produits disponibles en ce <?php echo $dateDuJour; ?> :</p>
    <?php

    $productsFullpath = "conf/products.json";
    $productsContent  = file_get_contents($productsFullpath);
    $productsArray    = json_decode($productsContent, JSON_OBJECT_AS_ARRAY);  

    $nombreProduits = count($productsArray);

    for($i =0; $i < $nombreProduits; $i++ ){
    $tableauProduit = $productsArray[$i];
    echo ("<p div class = 'nom'> " . $tableauProduit['nom'] . "</p>");
    echo ("<p div class = 'produit'>Longueur: " . $tableauProduit['longueur'] . " yards</p>");
    echo ("<p div class = 'produit'>Prix: " . $tableauProduit['prix'] . " euros</p>");
    echo ("<p div class = 'produit'>Nom alternatif: " . $tableauProduit['nom alternatif'] . "</p>");
    echo("<img src='" . $tableauProduit['image'] . "' alt='image produit'>");}

    ?>
  </main>
  <footer><a href="logout.php">déconnexion</a></footer>
</body>

</html>