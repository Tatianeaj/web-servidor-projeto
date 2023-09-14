<?php

function formatDate($date)
{
  $date = explode('-', $date);
  return $date[2] . '/' . $date[1] . '/' . $date[0];
}
