<?php
require('Api.php');
use Api\Api;
use Core\Core;

class GenerateWeek extends Api
{
  function __construct()
  {
    date_default_timezone_set("Europe/Paris");
    $recipes = json_decode(file_get_contents("../data.json"), true);
    $week = array();
    $ingredients = array();
    $this->request = (new Core())->get_request();
    print_r($this->request);
    for ($i=0; $i < $this->request['number']; $i++) {
      $random = rand(0, count($recipes) - 1);
      $recipe = $recipes[$random];
      array_push($week, $recipe);


      // Calcul des ingrédients
      foreach($recipe["Ingredients"] as $ingredientToAdd) {
        if(in_array($ingredientToAdd, $ingredients)) {
          $ingredient = array_search($ingredientToAdd['Name'], array_column($ingredients, 'Name'));
          $ingredients[$ingredient]["Quantity"] += $ingredientToAdd["Quantity"];
        } else {
          array_push($ingredients, $ingredientToAdd);
        }
      }
    }

    $html = '';
    foreach($week as $recipe) {
      $ingredientsHtml = '';
      foreach($recipe['Ingredients'] as $ingredient) {
        $ingredientsHtml .= '<div class="ingredient">'. $ingredient['Name'] .' ('. $ingredient['Quantity'] .')</div>';
      }
      $html .= '<div class="recipe"><div class="title">' . $recipe['Name'] . ' (' . $recipe['PreparationTime'] . ')</div>' . $ingredientsHtml . '</div>';
      $ingredientHtml = '';
    }

    $response = array(
      'success' => true,
      'html' => $html,
      'ingredients' => $ingredients
    );

    $this->sendResponse(true, [$html, $ingredients], 'Voici vos recettes');
  }
}

new GenerateWeek();

?>