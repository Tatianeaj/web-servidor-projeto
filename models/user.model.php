<?php
// $users_data = [
// 	[
// 		'name' => 'Gustavo',
// 		'email' => 'gustavo@gmail.com',
// 		'password' => '123',
// 		'birthdate' => '1990-01-01'
// 	],
// 	[
// 		'name' => 'Tatiane',
// 		'email' => 'tatiane@gmail.com',
// 		'password' => '12345',
// 		'birthdate' => '1990-01-01'
// 	]
// ];

class User
{
	private $cod_user;
	private $name;
	private $email;
	private $password;
	private $birthdate;
	private $isAdmin;

	public function __get($prop)
	{
		return $this->$prop;
	}

	public function __set($prop, $value)
	{
		$this->$prop = $value;
	}
}
