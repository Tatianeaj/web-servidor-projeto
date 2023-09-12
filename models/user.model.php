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
	// initialize error variables session and verify if user is logged
	session_start();
	$error = false;
	$error_message = '';
	// verify if user is trying to login
	if (isset($_POST['email']) && isset($_POST['senha'])) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		// verify if user exists
		$user_exists = false;
		foreach ($users_data as $user) {
			if ($user['email'] == $email && $user['senha'] == $senha) {
				$user_exists = true;
				break;
			}
		}
		// if user exists, log in
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
  // logout
  if (isset($_GET['page']) && ($_GET['page'] == 'logout')) {
    session_destroy();
    header('Location: index.php?page=home');
  }
?>