<?php
require('models/event.model.php');
include('utils/utils.php');

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: index.php?page=login');
}


$events = [];
foreach ($events_data as $event) {
  foreach ($event['users'] as $user) {
    if ($user == $_SESSION['user']['email']) {
      $events[] = $event;
    }
  }
}

function shareEvent($event)
{
  $url = "https://twitter.com/intent/tweet?text=Evento: " . $event['name'] . " - " . $event['publicPlace'] . " - " . $event['city'] . " - " . $event['state'] . " - " . formatDate($event['date']) . " - " . $event['startTime'];
  echo "window.open('" . $url . "', '_blank')";
}

function removeEvent($events, $event)
{
  $index = array_search($_SESSION['user']['email'], $event['users']);
  unset($event['users'][$index]);
  $events[$index] = $event;
}


require('views/myEvents.view.php');