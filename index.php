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

  Router::get('/', 'HomeController@index');
  Router::get('/home', 'HomeController@index');
  Router::get('/login', 'LoginController@login');
  Router::post('/login', 'LoginController@login');
  Router::get('/logout', 'LogoutController@logout');
  Router::get('/register', 'UserFormController@register');
  Router::post('/register', 'UserFormController@register');
  Router::get('/myEvents', 'MyEventsController@myEvents');
  Router::get('/newEvent', 'EventFormController@newEvent');
  Router::post('/newEvent', 'EventFormController@newEvent');

  Router::start();

  // if (isset($_GET['page'])) {
  //   $page = $_GET['page'];
  // } else {
  //   $page = 'home';
  // }
  // include "controllers/$page.controller.php"

  ?>
</body>

</html>