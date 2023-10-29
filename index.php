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

  Router::get('/', function () {
    require 'controllers/home.controller.php';
  });
  Router::get('/home', function () {
    require 'controllers/home.controller.php';
  });

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