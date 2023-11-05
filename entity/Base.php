<?php

namespace Entity;
use DateTime;

class Base
{
  public int $id = 0;
  public ?DateTime $createdDate = null;
  public ?DateTime $updatedDate = null;

  public function getId()
  {
    return $this->id;
  }

  public function getCreatedDate()
  {
    return $this->createdDate;
  }

  public function getUpdatedDate()
  {
    return $this->updatedDate;
  }
}

?>