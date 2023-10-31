<?php
class UserController
{
	use ViewTrait;
	public function login()
	{
		session_start();
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
				header('Location: /events');
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
	public function logout()
	{
		session_start();
		session_destroy();
		header('Location: /events');
	}
	public function register()
	{
		session_start();
		$error = false;
		$error_message = '';
		$success = false;
		$oldFormEmail = $_COOKIE['oldFormEmail'] ?? '';
		$oldFormName = $_COOKIE['oldFormName'] ?? '';
		$oldFormBirthdate = $_COOKIE['oldFormBirthdate'] ?? '';

		if (isset($_SESSION['user'])) {
			header('Location: index.php?page=events');
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
			} else if (strlen($password) < 6) {
				$error = true;
				$error_message = 'A senha deve ter no mínimo 6 caracteres!';
			} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = true;
				$error_message = 'E-mail inválido!';
			} else if (strtotime($birthdate) === false) {
				$error = true;
				$error_message = 'Data de nascimento inválida!';
			} else if (strtotime($birthdate) > time()) {
				$error = true;
				$error_message = 'Data de nascimento não pode ser no futuro!';
			} else {
				$bd = Connection::get();
				$query = $bd->prepare('SELECT * FROM users WHERE email = :email');
				$query->execute([':email' => $email]);
				$user = $query->fetchObject('User');
				if ($user) {
					$error = true;
					$error_message = 'E-mail já cadastrado!';
				} else {
					$user = new User();
					$user->name = $name;
					$user->email = $email;
					$user->password = $password;
					$user->birthdate = $birthdate;
					$user->isAdmin = false;
					$query = $bd->prepare('INSERT INTO users (name, email, password, birthdate, isAdmin) VALUES (:name, :email, :password, :birthdate, :isAdmin)');
					$query->execute([
						':name' => $user->name,
						':email' => $user->email,
						':password' => $user->password,
						':birthdate' => $user->birthdate,
						':isAdmin' => $user->isAdmin
					]);
					$user->cod_user = $bd->lastInsertId();

					$success = true;

					setcookie('oldFormEmail', '', time() - 3600);
					setcookie('oldFormName', '', time() - 3600);
					setcookie('oldFormBirthdate', '', time() - 3600);

					$success_message = 'Usuário cadastrado! Redirecionando...';

					$_SESSION['user'] = [
						'email' => $user->email,
						'name' => $user->name,
						'cod_user' => $user->cod_user,
						'isAdmin' => $user->isAdmin
					];
				}
			}
		}
		$this->render('userForm', [
			'error' => $error,
			'error_message' => $error_message,
			'success' => $success,
			'success_message' => $success_message ?? '',
			'oldFormEmail' => $oldFormEmail,
			'oldFormName' => $oldFormName,
			'oldFormBirthdate' => $oldFormBirthdate
		]);
	}
}
