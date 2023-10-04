<?php
$request = $_POST;

$recipes = json_decode(file_get_contents("../data.json"), true);

$newRecipe = [ 'Name' => $request['Name'], 'PreparationTime' => $request['PreparationTime'] ];

$response = 'La recette a bien été ajoutée';
if (in_array($newRecipe, $recipes)) {
  $response = 'Une recette porte déjà le même nom';
}

echo json_encode(['success' => true, 'response' => $response], JSON_PRETTY_PRINT);

?>