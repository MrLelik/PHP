<?php
/**
 * Created by PhpStorm.
 * Usertest: lelik
 * Date: 18.05.18
 * Time: 10:47
 */

namespace Class;


class Usertest
{
	public $name;
	public $lastName;
	public $login;
	public $email;
	public $pass;
	public $role;

	function __construct($data)
	{
		$this->name = $data['name'];
		$this->lastName = $data['last_name'];
		$this->login = $data['login'];
		$this->email = $data['email'];
		$this->pass = $data['pass'];
		$this->role = $data['role'];
	}

	public function print()
	{
		var_dump($this->name);
		echo '<br>';
		var_dump($this->lastName);
		echo '<br>';
		var_dump($this->login);
		echo '<br>';
		var_dump($this->email);
		echo '<br>';
		var_dump($this->pass);
		echo '<br>';
		var_dump($this->role);
	}
}

