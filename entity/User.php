<?php
namespace Entity;

class User extends Base
{
  public string $username = 'test';
  public ?string $password = null;
  public ?array $savedRecipes = null;

  public function getUsername()
  {
    return $this->username;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getSavedRecipes()
  {
    return $this->savedRecipes;
  }
}

?>