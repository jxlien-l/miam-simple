<?php
namespace Api;
require('core/core.php');
use Core\Core;

class Api extends Core
{
  public $request;

  function __construct() {
    $this->request = (new Core())->get_request();
  }

  function sendResponse(bool $success, mixed $response, $message = '')
  {
    echo json_encode(['success' => $success, 'response' => $response, 'message' => $message], JSON_PRETTY_PRINT);
  }
}

?>