<?php

namespace Api;

use Core\Core;

class Api extends Core
{
  public $request;

  function __construct() {
    $this->request = (new Core())->get_request();
  }

  function sendResponse(bool $success, string $response, $message = '')
  {
    echo json_encode(['success' => $success, 'response' => $response, 'message' => $message], JSON_PRETTY_PRINT);
  }
}

?>