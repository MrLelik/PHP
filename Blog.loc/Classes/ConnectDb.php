<?php

namespace Classes;

use PDO;

abstract class ConnectDb
{
	/**
	 * @var PDO
	 */
	const HOST = 'localhost';
	const DB_NAME = 'custom_blog';
	const USER = 'admin';
	const PASSWORD = '123';
	const CHARSET = 'utf8';
	const OPTIONS = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

	public static function getConnect()
	{
		if (!self::connectDb()) {
			self::connectDb();
			self::getConnect();
		}

		return self::connectDb();
	}

	private static function connectDb()
	{
		return new PDO(
			'mysql:host=' . self::HOST . ';
            dbname=' . self::DB_NAME . ';
            charset=' . self::CHARSET,
			self::USER,
			self::PASSWORD,
			self::OPTIONS
		);
	}

	public static function getUser($login)
	{
		$contact = self::getConnect();

		if ($contact) {
			$sql = "SELECT * FROM users WHERE login = :login";
			$stmt = $contact->prepare($sql);
			$stmt->bindParam(':login', $login, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		return false;
	}

	public static function addUser($data)
	{
		$contact = self::getConnect();

		if ($contact) {
			$sql = "INSERT INTO users (name, last_name, login, email, password, role)
                VALUES ( :name, :last_name, :registLogin, :email, :password, :role)";

			$stmt = $contact->prepare($sql);

			$stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
			$stmt->bindParam(':last_name', $data['lastName'], PDO::PARAM_STR);
			$stmt->bindParam(':registLogin', $data['registLogin'], PDO::PARAM_STR);
			$stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
			$stmt->bindParam(':password', $data['pass'], PDO::PARAM_STR);
			$stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);

			return $stmt->execute();
		}

		return false;
	}
}
