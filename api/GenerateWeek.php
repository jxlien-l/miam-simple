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



$filename = "Menus/".date("dmYhis").".json";
if(!file_exists($filename)) {
  //touch($filename);
  /*$file = fopen($filename, "w") or die("Error while opening the file");
  fwrite($file, "");
  fclose($file);*/
}

//file_put_contents($filename, json_encode($week, JSON_PRETTY_PRINT));
//print_r(json_encode($ingredients));

$response = array(
  'success' => true,
  'ingredients' => $ingredients,
  'menus' => $week
);
echo json_encode($response, JSON_PRETTY_PRINT);
?>