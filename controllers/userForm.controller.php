<?php
  require('models/user.model.php');
  
  $error = false;
  $error_message = '';
  $success = false;
  $oldFormEmail = $_COOKIE['oldFormEmail'] ?? '';
  $oldFormName = $_COOKIE['oldFormName'] ?? '';
  $oldFormBirthdate = $_COOKIE['oldFormBirthdate'] ?? '';
  
  if (isset($_SESSION['user'])) {
    header('Location: index.php?page=home');
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $oldFormName = $name = $_POST['name'];
    $oldFormEmail = $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $oldFormBirthdate = $birthdate = $_POST['birthdate'];

    setcookie('oldFormEmail', $email, time() + 3600);
    setcookie('oldFormName', $name, time() + 3600);
    setcookie('oldFormBirthdate', $birthdate, time() + 3600);

    if (empty($name) || empty($email) || empty($password) || empty($password_confirmation) || empty($birthdate)) {
      $error = true;
      $error_message = 'Preencha todos os campos!';
    } else if ($password !== $password_confirmation) {
      $error = true;
      $error_message = 'As senhas não conferem!';
    } 
    else if (strlen($password) < 6) {
      $error = true;
      $error_message = 'A senha deve ter no mínimo 6 caracteres!';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $error_message = 'E-mail inválido!';
    } 
    else if (strtotime($birthdate) === false) {
      $error = true;
      $error_message = 'Data de nascimento inválida!';
    } else if (strtotime($birthdate) > time()) {
      $error = true;
      $error_message = 'Data de nascimento não pode ser no futuro!';
    }
    else {
      
      $user_exists = false;
      foreach ($users_data as $user) {
        if ($user['email'] == $email) {
          $user_exists = true;
          break;
        }
      }
      if ($user_exists) {
        $error = true;
        $error_message = 'E-mail já cadastrado!';
      } else {
        
        $users_data[] = [
          'name' => $name,
          'email' => $email,
          'password' => $password,
          'birth_date' => $birthdate
        ];
        
        $success = true;

        setcookie('oldFormEmail', '', time() - 3600);
        setcookie('oldFormName', '', time() - 3600);
        setcookie('oldFormBirthdate', '', time() - 3600);
        
        echo 'Usuário cadastrado com sucesso!';
        echo '<pre>';
        echo var_dump($users_data);
        echo '</pre>';
      }
    }
  }
  require('views/userForm.view.php');
?>