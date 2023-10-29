<?php
// require('models/event.model.php');
// include('utils/utils.php');

// session_start();

// if (!isset($_SESSION['user'])) {
//   header('Location: index.php?page=login');
// }


// $events = [];
// foreach ($events_data as $event) {
//   foreach ($event['users'] as $user) {
//     if ($user == $_SESSION['user']['email']) {
//       $events[] = $event;
//     }
//   }
// }

// function shareEvent($event)
// {
//   $url = "https://twitter.com/intent/tweet?text=Evento: " . $event['name'] . " - " . $event['publicPlace'] . " - " . $event['city'] . " - " . $event['state'] . " - " . formatDate($event['date']) . " - " . $event['startTime'];
//   echo "window.open('" . $url . "', '_blank')";
// }

// function removeEvent($event, $events_data)
// {
//   $index = array_search($event, $events_data);
//   $userIndex = array_search($_SESSION['user']['email'], $events_data[$index]['users']);
//   unset($events_data[$index]['users'][$userIndex]);
// }


// require('views/myEvents.view.php');

class MyEventsController
{
  use ViewTrait;

  public function myEvents()
  {
    session_start();
    include('models/event.model.php');
    include('utils/utils.php');

    $events_data = $events_data ?? [];

    if (!isset($_SESSION['user'])) {
      header('Location: /login');
    }


    $events = [];
    foreach ($events_data as $event) {
      foreach ($event['users'] as $user) {
        if ($user == $_SESSION['user']['email']) {
          $events[] = $event;
        }
      }
    }

    $this->render('myEvents', [
      'events' => $events,
      'events_data' => $events_data,
    ]);
  }
}
