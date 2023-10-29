<?php

class DotEnvReader
{
  public string $path;
  public const BASE = '.env';
  public const LOCAL = '.env.local';
  public const TEST = '.env.test';

  public function __construct(string $path)
  {
    $this->path = $path;
  }

  public function getConfiguration(): array
  {
    if(!file_exists($this->path . '/' . self::BASE)) {
      throw new Exception();
    }
    $file = file_get_contents($this->path . '/' . self::BASE);
    if(empty($file)) {
      throw new Exception();
    }
    $configuration = [];
    $rows = explode(PHP_EOL, $file);
    foreach ($rows as $value) {
      if(trim($value)[0] !== '#') {
        $keyValue = explode('=', trim($value));
        $configuration[$keyValue[0]] = $keyValue[1];
      }
    }
    return $configuration;
  }

  public function getValue(string $variable): string
  {
    $configuration = $this->getConfiguration();
    $result = null;
    if(isset($configuration[$variable])) {
      $result = $configuration[$variable];
    }
    return $result;
  }

}

?>