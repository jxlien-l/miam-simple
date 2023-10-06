<?php
use Api\Api;

class test{
  private $api = new Api();
function __construct()
{


$recipes = json_decode(file_get_contents("../data.json"), true);

$newRecipe = [ 'Name' => $request['Name'], 'PreparationTime' => $request['PreparationTime'] ];

$response = 'La recette a bien été ajoutée';
if (in_array($newRecipe, $recipes)) {
  $response = 'Une recette porte déjà le même nom';
}

$this->api->sendResponse(true, $response);

}
}

?>