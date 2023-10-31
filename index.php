<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>

<body>
  <?php

  require 'vendor/autoload.php';

  use Pecee\SimpleRouter\SimpleRouter as Router;

  Router::get('/', 'EventController@ListEvents');
  Router::get('/events', 'EventController@ListEvents');
  Router::get('/login', 'UserController@login');
  Router::post('/login', 'UserController@login');
  Router::get('/logout', 'UserController@logout');
  Router::get('/register', 'UserController@register');
  Router::post('/register', 'UserController@register');
  Router::get('/myEvents', 'MyEventController@listMyEvents');
  Router::get('/newEvent', 'EventController@newEvent');
  Router::post('/newEvent', 'EventController@newEvent');
  Router::get('/myEvents/remove/{cod_event}', 'MyEventController@removeMyEvent');
  Router::get('/myEvents/add/{cod_event}', 'MyEventController@subscribeToEvent');
  Router::get('/events/remove/{cod_event}', 'EventController@deleteEvent');
  Router::get('/events/adit/{cod_event}', 'EventController@editEvent');
  Router::post('/events/adit/{cod_event}', 'EventController@editEvent');

  Router::start();

  ?>
</body>

</html>