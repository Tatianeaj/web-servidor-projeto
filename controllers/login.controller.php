<?php
// require('models/user.model.php');

// session_start();
// $error = false;
// $error_message = '';

// $oldEmail = $_COOKIE['oldEmail'] ?? '';

// if (isset($_POST['email']) && isset($_POST['password'])) {

// 	$oldEmail = $email = $_POST['email'];
// 	$password = $_POST['password'];

// 	setcookie('oldEmail', $email);

// 	$user_exists = false;
// 	foreach ($users_data as $user) {
// 		if ($user['email'] == $email && $user['password'] == $password) {
// 			$user_exists = true;
// 			$user_name = $user['name'];
// 			break;
// 		}
// 	}
// 	if ($user_exists) {
// 		$_SESSION['user'] = [
// 			'email' => $email,
// 			'name' => $user_name
// 		];
// 		header('Location: index.php?page=home');
// 	} else {
// 		$error = true;
// 		$error_message = 'Usuário ou senha inválidos';
// 	}
// }
// require('views/login.view.php');

class LoginController
{
	use ViewTrait;
	public function login()
	{
		session_start();
		include('models/user.model.php');
		include('utils/utils.php');
		$error = false;
		$error_message = '';
		$oldEmail = $_COOKIE['oldEmail'] ?? '';

		if (isset($_POST['email']) && isset($_POST['password'])) {

			$oldEmail = $email = $_POST['email'];
			$password = $_POST['password'];
			setcookie('oldEmail', $email);


			$bd = Connection::get();
			$query = $bd->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
			$query->execute([':email' => $email, ':password' => $password]);
			$user = $query->fetchObject('User');
			if ($user) {
				$_SESSION['user'] = [
					'email' => $user->email,
					'name' => $user->name,
					'cod_user' => $user->cod_user,
					'isAdmin' => $user->isAdmin
				];
				header('Location: /home');
			} else {
				$error = true;
				$error_message = 'Usuário ou senha inválidos';
			}
		}

		$this->render('login', [
			'error' => $error,
			'error_message' => $error_message,
			'oldEmail' => $oldEmail
		]);
	}
}
