<?php
class Event
{
  private $cod_event;
  private $name;
  private $date;
  private $startTime;
  private $cod_address;
  private $address;

  public function __get($prop)
  {
    return $this->$prop;
  }

  public function __set($prop, $value)
  {
    $this->$prop = $value;
  }

  public function shareEvent()
  {
    $url = "https://twitter.com/intent/tweet?text=Evento: " . $this->name . " - " . $this->address->publicPlace . " - " . $this->address->city . " - " . $this->address->state . " - " . formatDate($this->date) . " - " . $this->startTime;
    echo "window.open('" . $url . "', '_blank')";
  }

  public function isUserSubscribed($cod_user)
  {
    $bd = Connection::get();
    $query = $bd->prepare('SELECT * FROM users_events WHERE cod_user = :cod_user AND cod_event = :cod_event');
    $query->execute([':cod_user' => $cod_user, ':cod_event' => $this->cod_event]);
    $result = $query->fetch();
    return $result ? true : false;
  }
}
