<?php
class MyEventController
{
  use ViewTrait;

  public function listMyEvents()
  {
    session_start();
    include('utils/utils.php');

    if (!isset($_SESSION['user'])) {
      header('Location: /login');
    }

    $events = [];
    //conenct to database
    $bd = Connection::get();
    //get all events in events that are in users_events table and the user is the logged user
    $query = $bd->prepare('SELECT * FROM events INNER JOIN users_events ON events.cod_event = users_events.cod_event WHERE users_events.cod_user = :id');
    $query->execute([':id' => $_SESSION['user']['cod_user']]);
    $events = $query->fetchAll(PDO::FETCH_CLASS, 'Event');
    //get address of each event
    $query = $bd->prepare('SELECT * FROM address WHERE address.cod_address = :id');
    foreach ($events as $event) {
      $query->execute([':id' => $event->cod_address]);
      $address = $query->fetchObject('Address');
      $event->address = $address;
    }

    $this->render('myEvents', [
      'events' => $events,
    ]);
  }

  public function removeMyEvent($cod_event)
  {
    session_start();
    include('models/event.model.php');
    include('utils/utils.php');

    if (!isset($_SESSION['user'])) {
      header('Location: /login');
    }

    $bd = Connection::get();
    $query = $bd->prepare('DELETE FROM users_events WHERE users_events.cod_event = :cod_event AND users_events.cod_user = :cod_user');
    $query->execute([':cod_event' => $cod_event, ':cod_user' => $_SESSION['user']['cod_user']]);

    header('Location: /myEvents');
  }

  public function subscribeToEvent($cod_event)
  {
    session_start();
    include('models/event.model.php');
    include('utils/utils.php');

    if (!isset($_SESSION['user'])) {
      header('Location: /login');
    }

    $bd = Connection::get();
    $query = $bd->prepare('INSERT INTO users_events (cod_user, cod_event) VALUES (:cod_user, :cod_event)');
    $query->execute([':cod_user' => $_SESSION['user']['cod_user'], ':cod_event' => $cod_event]);

    header('Location: /myEvents');
  }
}
