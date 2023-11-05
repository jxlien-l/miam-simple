<?php

require('./entity/Base.php');
use Entity\Base;

class Database
{
  public PDO $connexion;
  public function __construct(string $dsn, string $username, string $password, array $options = [])
  {
    $this->connexion = new PDO($dsn, $username, $password);
    return $this->connexion;
  }


  public function update(object $toSave): bool
  {
    $toFilter = [];
    foreach((new ReflectionClass(Base::class))->getProperties() as $baseProperty) {
      array_push($toFilter, $baseProperty->name);
    }

    // We get an object, its a class we don't know what is it, so:
    $reflection = new ReflectionObject($toSave);
    $class = explode('\\', $reflection->name);
    if(isset($class[1])) {
      $class = $class[1];
    }

    $properties = '';
    $data['table'] = $class;

    foreach ($reflection->getProperties() as $propertyArray) {
      $property = $propertyArray->getName();
      $getter = 'get' . $property;
      if($toSave->$getter() !== null && !in_array($property, $toFilter)) {
        $properties .= $property . '=:' . $property;
        $tmp = $reflection->getProperties();
        if(!end($tmp) === $propertyArray) {
          $properties .= ', ';
        }
        $data[$property] = $toSave->$getter();
      }
    }

    $query = sprintf('UPDATE :table SET %s WHERE id = :id', $properties);


    $statement = $this->connexion->prepare($query);
    return $statement->execute($data);
  }

}

?>