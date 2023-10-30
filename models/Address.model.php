<?php

class Address
{
  private $cod_address;
  private $publicPlace;
  private $city;
  private $state;

  // public function __construct($cod_address, $publicPlace, $city, $state)
  // {
  //   $this->cod_address = $cod_address;
  //   $this->publicPlace = $publicPlace;
  //   $this->city = $city;
  //   $this->state = $state;
  // }

  public function __get($prop)
  {
    return $this->$prop;
  }

  public function __set($prop, $value)
  {
    $this->$prop = $value;
  }
}
