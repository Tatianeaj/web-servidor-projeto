<?php
// require('models/event.model.php');
// require('models/state.model.php');

// date_default_timezone_set('America/Sao_Paulo');
// //start session
// session_start();

// if (!isset($_SESSION['user'])) {
//   header('Location: index.php?page=login');
// }

// $error = false;
// $error_message = '';
// $success = false;

// $oldEventName = $_COOKIE['oldEventName'] ?? '';
// $oldCity = $_COOKIE['oldCity'] ?? '';
// $oldPublicPlace = $_COOKIE['oldPublicPlace'] ?? '';
// $oldState = $_COOKIE['oldState'] ?? '';
// $oldDate = $_COOKIE['oldDate'] ?? '';
// $oldStartTime = $_COOKIE['oldStartTime'] ?? '';

// //form validation
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   //fill variables with form data
//   $oldEventName = $name = $_POST['name'];
//   $oldCity = $city = $_POST['city'];
//   $oldPublicPlace = $publicPlace = $_POST['publicPlace'];
//   $oldState = $state = $_POST['state'];
//   $oldDate = $date = $_POST['date'];
//   $oldStartTime = $startTime = $_POST['startTime'];

//   //set cookies with form data
//   setcookie('oldEventName', $name, time() + 3600);
//   setcookie('oldCity', $city, time() + 3600);
//   setcookie('oldPublicPlace', $publicPlace, time() + 3600);
//   setcookie('oldState', $state, time() + 3600);
//   setcookie('oldDate', $date, time() + 3600);
//   setcookie('oldStartTime', $startTime, time() + 3600);

//   //check if all fields are filled
//   if (
//     empty($name) ||
//     empty($city) ||
//     empty($publicPlace) ||
//     empty($state) ||
//     empty($date) ||
//     empty($startTime)
//   ) {
//     $error = true;
//     $error_message = 'Preencha todos os campos!';
//   } else if (strtotime($date) < strtotime(date('Y-m-d'))) {
//     $error = true;
//     $error_message = 'Data inválida!';
//     //if yyyy-mm-dd is equal to today
//   } else if (strtotime($date) === strtotime(date('Y-m-d')) && strtotime($startTime) < strtotime(date('H:i'))) {
//     //if start time is less than current time
//     $error = true;
//     $error_message = 'Horário inválido!';
//   } else {
//     //create event
//     $events_data[] = [
//       'name' => $name,
//       'city' => $city,
//       'publicPlace' => $publicPlace,
//       'state' => $state,
//       'date' => $date,
//       'startTime' => $startTime
//     ];

//     $success = true;
//     $success_message = 'Evento cadastrado com sucesso!';
//     //clear cookies
//     setcookie('oldEventName', '', time() - 3600);
//     setcookie('oldCity', '', time() - 3600);
//     setcookie('oldPublicPlace', '', time() - 3600);
//     setcookie('oldState', '', time() - 3600);
//     setcookie('oldDate', '', time() - 3600);
//     setcookie('oldStartTime', '', time() - 3600);
//   }
// }
// require('views/eventForm.view.php');

class EventFormController
{
  use ViewTrait;

  public function newEvent()
  {
    require('models/event.model.php');
    require('models/state.model.php');

    date_default_timezone_set('America/Sao_Paulo');
    //start session
    session_start();

    if (!isset($_SESSION['user'])) {
      header('Location: /login');
    }

    $error = false;
    $error_message = '';
    $success = false;
    $success_message = '';

    $oldEventName = $_COOKIE['oldEventName'] ?? '';
    $oldCity = $_COOKIE['oldCity'] ?? '';
    $oldPublicPlace = $_COOKIE['oldPublicPlace'] ?? '';
    $oldState = $_COOKIE['oldState'] ?? '';
    $oldDate = $_COOKIE['oldDate'] ?? '';
    $oldStartTime = $_COOKIE['oldStartTime'] ?? '';

    //form validation
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //fill variables with form data
      $oldEventName = $name = $_POST['name'];
      $oldCity = $city = $_POST['city'];
      $oldPublicPlace = $publicPlace = $_POST['publicPlace'];
      $oldState = $state = $_POST['state'];
      $oldDate = $date = $_POST['date'];
      $oldStartTime = $startTime = $_POST['startTime'];

      //set cookies with form data
      setcookie('oldEventName', $name, time() + 3600);
      setcookie('oldCity', $city, time() + 3600);
      setcookie('oldPublicPlace', $publicPlace, time() + 3600);
      setcookie('oldState', $state, time() + 3600);
      setcookie('oldDate', $date, time() + 3600);
      setcookie('oldStartTime', $startTime, time() + 3600);

      //check if all fields are filled
      if (
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
        //create event object

        // insert address info into database and get id
        $bd = Connection::get();
        $query = $bd->prepare('INSERT INTO address (city, publicPlace, state) VALUES (:city, :publicPlace, :state)');
        $query->execute([':city' => $city, ':publicPlace' => $publicPlace, ':state' => $state]);
        $address_id = $bd->lastInsertId();

        // insert event info into database
        $query = $bd->prepare('INSERT INTO events (name, date, startTime, cod_address) VALUES (:name, :date, :startTime, :cod_address)');
        $query->execute([':name' => $name, ':date' => $date, ':startTime' => $startTime, ':cod_address' => $address_id]);

        $success = true;
        $success_message = 'Evento cadastrado com sucesso!';
        //clear cookies
        setcookie('oldEventName', '', time() - 3600);
        setcookie('oldCity', '', time() - 3600);
        setcookie('oldPublicPlace', '', time() - 3600);
        setcookie('oldState', '', time() - 3600);
        setcookie('oldDate', '', time() - 3600);
        setcookie('oldStartTime', '', time() - 3600);
      }
    }
    $this->render('eventForm', [
      'error' => $error,
      'error_message' => $error_message,
      'success' => $success,
      'success_message' => $success_message,
      'oldEventName' => $oldEventName,
      'oldCity' => $oldCity,
      'oldPublicPlace' => $oldPublicPlace,
      'oldState' => $oldState,
      'oldDate' => $oldDate,
      'oldStartTime' => $oldStartTime,
      'states' => $states
    ]);
  }
}
