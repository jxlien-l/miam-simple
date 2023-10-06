<?php
  require('api/Api.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Générateur</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="generate">
    <label for="nb_menus">Nombre de menus :</label>
    <input type="number" name="nb_menus" id="nb_menus" value="2" min="1">
    <button id="sb_generate_week">Générer</button>
  </div>
  <div id="recipes">

  </div>
</body>
</html>