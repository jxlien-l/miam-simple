<?php
  require('core/core.php');
  use Core\Core;
  require('core/DotEnvReader.php');
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
  <header>
    <a href="/index.php">Home</a> | <a href="/index.php?p=generate">Générer</a> | <a href="#">Exporter</a>
  </header>
  <main>
    <?php
      (new Core())->navigation();
      $reader = new DotEnvReader('.');
      $reader->getConfiguration();
    ?>
  </main>
</body>
</html>