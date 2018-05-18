<?php

namespace Class;

use PDO;

abstract class ConnectDbtest
{
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

	public static function clean($data)
	{
		$data = array_map(function ($d) {return stripcslashes(trim($d));}, $data);
		$data['pass'] = md5($data['pass']);
		return $data;
	}
}