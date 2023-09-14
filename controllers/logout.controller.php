<?php
  require('models/user.model.php');

  session_start();

  if (isset($_GET['page']) && ($_GET['page'] == 'logout')) {
    session_destroy();
    header('Location: index.php?page=home');
  }
