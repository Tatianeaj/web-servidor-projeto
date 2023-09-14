<?php
require('models/event.model.php');

session_start();


function formatDate($date)
{
  $date = explode('-', $date);
  return $date[2] . '/' . $date[1] . '/' . $date[0];
}

require('views/home.view.php');
