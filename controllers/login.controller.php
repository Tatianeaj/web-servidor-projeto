<?php
require('models/user.model.php');

session_start();
$error = false;
$error_message = '';

$oldEmail = $_COOKIE['oldEmail'] ?? '';

if (isset($_POST['email']) && isset($_POST['password'])) {

	$oldEmail = $email = $_POST['email'];
	$password = $_POST['password'];

	setcookie('oldEmail', $email);

	$user_exists = false;
	foreach ($users_data as $user) {
		if ($user['email'] == $email && $user['password'] == $password) {
			$user_exists = true;
			$user_name = $user['name'];
			break;
		}
	}
	if ($user_exists) {
		$_SESSION['user'] = [
			'email' => $email,
			'name' => $user_name
		];
		header('Location: index.php?page=home');
	} else {
		$error = true;
		$error_message = 'Usuário ou senha inválidos';
	}
}
require('views/login.view.php');
