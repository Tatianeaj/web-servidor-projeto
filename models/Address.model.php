<?php
class Address
{
  private $cod_address;
  private $publicPlace;
  private $city;
  private $state;

  public function __get($prop)
  {
    return $this->$prop;
  }

  public function __set($prop, $value)
  {
    $this->$prop = $value;
  }
}
