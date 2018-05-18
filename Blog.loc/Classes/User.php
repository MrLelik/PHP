<?php

namespace Classes;


class User
{
	public $name;
	public $lastName;
	public $login;
	public $email;
	public $role;

	public function __construct($dataObj)
	{
		$this->name = $dataObj->name;
		$this->lastName = $dataObj->last_name;
		$this->login = $dataObj->login;
		$this->email = $dataObj->email;
		$this->role = $dataObj->role;
		echo 'Hi i User Blog' . '<pre>';
		var_dump($dataObj);
	}


}
