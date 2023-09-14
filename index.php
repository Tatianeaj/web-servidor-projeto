<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>

<body>
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 'home';
  }
  include "controllers/$page.controller.php"
  ?>
</body>

</html>