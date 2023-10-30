<?php
// $events_data = [
//   [
//     'name' => 'Festa do Peão',
//     'date' => '2022-10-20',
//     'startTime' => '20:00',
//     'publicPlace' => 'Centro de Eventos',
//     'city' => 'São Paulo',
//     'state' => 'SP',
//     'users' => ['gustavo@gmail.com']
//   ],
//   [
//     'name' => 'Festa do Jão',
//     'date' => '2022-10-27',
//     'startTime' => '20:00',
//     'publicPlace' => 'Prédio do Jão',
//     'city' => 'Ponta Grossa',
//     'state' => 'PR',
//     'users' => ['gustavo@gmail.com']
//   ],
//   [
//     'name' => 'Pamonhaço',
//     'date' => '2022-11-23',
//     'startTime' => '14:00',
//     'publicPlace' => 'Praça do Pamonhaço',
//     'city' => 'Ponta Grossa',
//     'state' => 'PR',
//     'users' => ['tatiane@gmail.com']
//   ],
//   [
//     'name' => 'Festa Natalina',
//     'date' => '2022-12-24',
//     'startTime' => '20:00',
//     'publicPlace' => 'Shopping',
//     'city' => 'São Paulo',
//     'state' => 'SP',
//     'users' => []
//   ]
// ];
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
