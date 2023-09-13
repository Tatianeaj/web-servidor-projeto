<?php 
require('models/event.model.php');

    session_start();



    if(!isset($_SESSION['user'])){
        header('Location: index.php?page=login');
    }
           

    // verify if user is inside the array of user in each event of events_data
    $eventos = [];
    foreach ($events_data as $event) {
        foreach ($event['users'] as $user) {
            if ($user == $_SESSION['user']['email']) {
                $eventos[] = $event;
            }
        }
    }



    require('views/myEvents.view.php');
?>