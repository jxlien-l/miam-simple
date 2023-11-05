<?php
  require('core/core.php');
  require('core/DotEnvReader.php');
  require('core/Database.php');
  require('entity/User.php');
  use Core\Core;
  use Entity\User;
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
      $config = $reader->getConfiguration();

      $cnx = null;
      try {
        $cnx = new Database($reader->getValue('DSN'), 'miamuser', 'miampassword');
      } catch (\Throwable $th) {
        echo $th;
      }

      $cnx->update(new User());

    ?>
  </main>
</body>
</html>