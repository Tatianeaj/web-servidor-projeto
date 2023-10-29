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

    $events_data = $events_data ?? [];

    $this->render('home', [
      'events_data' => $events_data,
      'user_name' => $user_name ?? '',
      'user_email' => $user_email ?? '',
    ]);
  }
}
