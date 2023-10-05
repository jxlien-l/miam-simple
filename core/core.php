<?php

namespace Core;

class Core
{
  function get_request() {
    return $_GET . $_POST;
  }
}

?>