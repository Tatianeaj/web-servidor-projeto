<?php
	$users_data = [
		[
			'email' => 'gustavo@gmail.com',
			'senha' => '123'
    ],
		[
			'email' => 'tatiane@gmail.com',
			'senha' => '12345'
		]
	];
	$oldEmail = $_COOKIE['oldEmail'] ?? '';
	session_start();
	$error = false;
	$error_message = '';
	
	if (isset($_POST['email']) && isset($_POST['senha'])) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		setcookie('oldEmail', $email);
		$oldEmail = $email;
		$user_exists = false;
		foreach ($users_data as $user) {
			if ($user['email'] == $email && $user['senha'] == $senha) {
				$user_exists = true;
				break;
			}
		}
		if ($user_exists) {
			$_SESSION['user'] = [
				'email' => $email,
				'senha' => $senha
			];
			header('Location: index.php?page=home');
		} else {
			$error = true;
			$error_message = 'Usuário ou senha inválidos';
		}
	}


  if (isset($_GET['page']) && ($_GET['page'] == 'logout')) {
    session_destroy();
    header('Location: index.php?page=home');
  }
?>