<?php
  require('models/event.model.php');
  require('models/state.model.php');

  //set timezone to user timezone
  date_default_timezone_set('America/Sao_Paulo');
  //start session
  session_start();

  //verifica se o usuário está logado
  if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=login');
  }

  $error = false;
  $error_message = '';
  $success = false;

  $oldEventName = $_COOKIE['oldEventName'] ?? '';
  $oldCity = $_COOKIE['oldCity'] ?? '';
  $oldPublicPlace = $_COOKIE['oldPublicPlace'] ?? '';
  $oldState = $_COOKIE['oldState'] ?? '';
  $oldDate = $_COOKIE['oldDate'] ?? '';
  $oldStartTime = $_COOKIE['oldStartTime'] ?? '';

  //form validation
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //fill variables with form data
    $name = $_POST['name'];
    $city = $_POST['city'];
    $publicPlace = $_POST['publicPlace'];
    $state = $_POST['state'];
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];

    //set cookies with form data
    setcookie('oldEventName', $name, time() + 3600);
    setcookie('oldCity', $city, time() + 3600);
    setcookie('oldPublicPlace', $publicPlace, time() + 3600);
    setcookie('oldState', $state, time() + 3600);
    setcookie('oldDate', $date, time() + 3600);
    setcookie('oldStartTime', $startTime, time() + 3600);

    //check if all fields are filled
    if(
      empty($name) ||
      empty($city) ||
      empty($publicPlace) ||
      empty($state) ||
      empty($date) ||
      empty($startTime)
    ) {
      $error = true;
      $error_message = 'Preencha todos os campos!';
    } else if (strtotime($date) < strtotime(date('Y-m-d'))) {
      $error = true;
      $error_message = 'Data inválida!';
      //if yyyy-mm-dd is equal to today
    } else if (strtotime($date) === strtotime(date('Y-m-d')) && strtotime($startTime) < strtotime(date('H:i'))) {
      //if start time is less than current time
      $error = true;
      $error_message = 'Horário inválido!';
    } else {
      //create event
      $events_data[] = [
        'name' => $name,
        'city' => $city,
        'publicPlace' => $publicPlace,
        'state' => $state,
        'date' => $date,
        'startTime' => $startTime
      ];

      $success = true;
      $error_message = 'Evento cadastrado com sucesso!';
      //clear cookies
      setcookie('oldEventName', '', time() - 3600);
      setcookie('oldCity', '', time() - 3600);
      setcookie('oldPublicPlace', '', time() - 3600);
      setcookie('oldState', '', time() - 3600);
      setcookie('oldDate', '', time() - 3600);
      setcookie('oldStartTime', '', time() - 3600);

      echo 'Evento cadastrado com sucesso!';
      echo '<pre>';
      var_dump($events_data);
      echo '</pre>';
    }
  }
  require('views/eventForm.view.php');
?>