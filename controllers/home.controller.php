<?php
require('models/event.model.php');
include('utils/utils.php');

session_start();


function subscribe($event, $events_data)
{
  $index = array_search($event, $events_data);
  $events_data[$index]['users'][] = $_SESSION['user']['email'];
}


function isSubscribed($event)
{
  foreach ($event['users'] as $user) {
    if ($user == $_SESSION['user']['email']) {
      return true;
    }
  }
  return false;
}

require('views/home.view.php');
