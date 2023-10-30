<?php
// require('models/event.model.php');
// include('utils/utils.php');

// session_start();


// function subscribe($event, $events_data)
// {
//   $index = array_search($event, $events_data);
//   $events_data[$index]['users'][] = $_SESSION['user']['email'];
// }


// function isSubscribed($event)
// {
//   foreach ($event['users'] as $user) {
//     if ($user == $_SESSION['user']['email']) {
//       return true;
//     }
//   }
//   return false;
// }

// require('views/home.view.php');
class HomeController
{
  use ViewTrait;

  public function index()
  {
    session_start();
    include('models/event.model.php');
    include('utils/utils.php');
    include('database/connection.php');

    $events_data = $events_data ?? [];

    $bd = Connection::get();
    $query = $bd->prepare('SELECT * FROM events');
    $query->execute();
    $events_data = $query->fetchAll(PDO::FETCH_CLASS, 'Event');
    $query = $bd->prepare('SELECT * FROM address WHERE address.cod_address = :id');
    foreach ($events_data as $event) {
      $query->execute([':id' => $event->cod_address]);
      $address = $query->fetchObject('Address');
      $event->address = $address;
    }

    $this->render('home', [
      'events_data' => $events_data,
      'user_name' => $user_name ?? '',
      'user_email' => $user_email ?? '',
    ]);
  }
}
