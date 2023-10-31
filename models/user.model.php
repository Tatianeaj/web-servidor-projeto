<?php
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
