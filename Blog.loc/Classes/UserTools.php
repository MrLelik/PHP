<?php


namespace Classes;


abstract class UserTools
{

	public static function validateFormLogin($data)
	{
		if ( ! isset($data['login']) || empty($data['login'])) {
			$_SESSION['error_message'] = 'Login can not by empty';

			return false;
		}

		if ( ! isset($data['pass']) || empty($data['pass'])) {
			$_SESSION['error_message'] = 'Password can not by empty';

			return false;
		}

		return self::controlGetUser(self::clean($data));
	}

	public static function controlGetUser($data)
	{
		$userObj = ConnectDb::getUser($data['login']);

		if ($userObj) {
			if ($data['pass'] == $userObj->password) {
				$_SESSION['error_message'] = false;

				$_SESSION['access'] = true;
				$_SESSION['role'] = $userObj->role;
				$_SESSION['login'] = $userObj->login;

				return $userObj;
			} else {
				$_SESSION['error_message'] = 'Wrong password';

				$_SESSION['access'] = false;

				return false;
			}
		} else {
			$_SESSION['error_message'] = 'Login not found';

			$_SESSION['access'] = false;

			return false;
		}
	}

	public static function validateFormRegister($data)
	{

		if ($data['pass'] !== $data['repeatPass']) {
			$_SESSION['error_message'] = 'Inputted password not confirm';

			return false;
		}

		if ( ! isset($data['registLogin']) || empty($data['registLogin'])) {
			$_SESSION['error_message'] = 'Login can not by empty';

			return false;
		}

		if ( ! isset($data['email']) || empty($data['email'])) {
			$_SESSION['error_message'] = 'Email can not by empty';

			return false;
		}

		if (ConnectDb::getUser($data['registLogin'])) {
			$_SESSION['error_message'] = 'Login is not available';

			return false;
		}

		return self::controlAddUser(self::clean($data));
	}

	public static function controlAddUser($data)
	{
		if (ConnectDb::addUser($data)) {
			$_SESSION['error_message'] = false;

			return ConnectDb::getUser($data['registLogin']);
		} else {
			$_SESSION['error_message'] = 'Register user not complete';

			return false;
		}
	}

	public static function clean($data)
	{
		$data         = array_map(function ($d) {
			return stripcslashes(trim($d));
		}, $data);
		$data['pass'] = self::hash($data['pass']);

		return $data;
	}

	public static function hash($value)
	{
		return md5($value);
	}

	public static function getErrorMessage()
	{
		return isset($_SESSION['error_message']) ? $_SESSION['error_message']
			: false;
	}
}
