<?php

namespace Classes;


abstract class UserTools
{

	public static function validateFormRegister($data)
	{
		$_SESSION['error_message'] = false;

		if ($data['pass'] !== $data['repeatPass']) {
			$_SESSION['error_message'] = 'Inputted password not confirm';
			return;
		}

		if (!isset($data['registLogin']) || empty($data['registLogin'])) {
			$_SESSION['error_message'] = 'Login can not by empty';
			return;
		}

		if (!isset($data['email']) || empty($data['email'])) {
			$_SESSION['error_message'] = 'Email can not by empty';
			return;
		}

		if (ConnectDb::getUser($data['registLogin'])) {
			$_SESSION['error_message'] = 'Login is not available';
			return;
		}

		return true;
	}

	public static function getErrorMessage()
	{
		return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : false;
	}

	public static function hash($value)
	{
		return md5($value);
	}

	public static function clean($data)
	{
		$data = array_map(function ($d) {return stripcslashes(trim($d));}, $data);
		$data['pass'] = self::hash($data['pass']);
		return $data;
	}
}


//function validateFormRegister($post)
//{
//	if (addUser($post)) {
//		$_SESSION['error_message'] = false;
//		header('Location: /register.php');
//		exit();
//	} else {
//		$_SESSION['error_message'] = 'Register user not complete';
//	}
//}