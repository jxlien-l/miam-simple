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
  <header>
    <a href="/index.php">Home</a> | <a href="/index.php?p=generate">Générer</a> | <a href="#">Exporter</a>
  </header>
  <main>
    <?php
      $page = 'error404';
      if(isset($_GET['p'])) {
        if(file_exists('views/'.$_GET['p'].'.php'))
        {
          $page = $_GET['p'];
        }
      }
      include('views/'.$page.'.php');
    ?>
  </main>
</body>
</html>