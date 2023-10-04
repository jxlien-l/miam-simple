<?php
date_default_timezone_set("Europe/Paris");
$request = $_POST;
$recipes = json_decode(file_get_contents("../data.json"), true);
$week = array();
$ingredients = array();
for ($i=0; $i < $request['number']; $i++) {
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

$response = array(
  'success' => true,
  'ingredients' => $ingredients,
  'recipes' => $week
);
echo json_encode($response, JSON_PRETTY_PRINT);
?>