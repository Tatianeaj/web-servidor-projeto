<?php
require('models/event.model.php');
include('utils/utils.php');

session_start();


function subscribe($event)
{

  $index = array_search($_SESSION['user']['email'], $event['users']);
  $event['users'][$index] = $_SESSION['user']['email'];
  $events[$index] = $event;
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
