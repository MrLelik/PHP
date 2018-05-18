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

	public static function getUser($user)
	{
		$contact = self::getConnect();
		if ($contact) {
			$sql = "SELECT * FROM users WHERE login = :login";
			$stmt = $contact->prepare($sql);
			$stmt->bindParam(':login', $user, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		return false;
	}
}
