<?php

namespace Core;

class Core
{
  function get_request() {
    return $_GET + $_POST;
  }

  function navigation() {
    $page = 'error404';
      if(isset($_GET['p'])) {
        if(file_exists('views/'.$_GET['p'].'.php'))
        {
          $page = $_GET['p'];
        }
      }
      include('views/'.$page.'.php');
  }

  function log(string $message)
  {
    ob_start();
    echo date("H:i:s") . " - $message - ".PHP_EOL;
    ob_clean();
    ob_end_clean();
  }
}

?>