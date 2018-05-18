<?php

namespace Classes;


class User
{
	public $name;
	public $lastName;
	public $login;
	public $email;
	public $password;
	public $role;

	public function __construct($data)
	{
		$this->name = $data['name'];
		$this->lastName = $data['lastName'];
		$this->login = $data['registLogin'];
		$this->email = $data['email'];
		$this->password = $data['pass'];
		$this->role = $data['role'];
		echo 'Hi i User Blog' . '<pre>';
		var_dump($data);
	}


}
