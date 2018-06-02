<?php

class Model
{
    /*
        Модель обычно включает методы выборки данных, это могут быть:
        > методы нативных библиотек pgsql или mysql;
        > методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
        > методы ORM;
        > методы для работы с NoSQL;
        > и др.
    */
    // Метод подключения к базе данныхs
	/**
	 * @var PDO
	 */
    public function connect()
    {
        $connect = '';
        try {
            $connect = new PDO(
	            'mysql:host=' . HOST . ';
            dbname=' . DB_NAME . ';
            charset=' . CHARSET,
	            USER,
	            PASSWORD,
	            OPTIONS
            );
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $connect;
    }

	/**
	 * @return array|null
	 *
	 * @Do get -> All Articles and Author
	 */
	public function getPosts()
	{
		$data = null;
		try {
			$data = $this->connect()
			             ->query("SELECT * FROM articles INNER JOIN users ON articles.author = users.id")
			             ->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $data;
	}

	/**
	 * @param $url
	 *
	 * @return mixed|null
	 *
	 * @Do get -> One Article (URL) and Author
	 */
	public function getContentOneNews($url)
	{
		$data = null;
		try {
			$data = $this->connect()
			             ->query("SELECT * FROM articles INNER JOIN users ON articles.author = users.id WHERE url='$url'")
			             ->fetch(PDO::FETCH_OBJ);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $data;
	}

	/**
	 * @param $login
	 *
	 * @return bool
	 *
	 * @Do getting a user by login
	 */
	public function getUser($login)
	{
		try {
			$sql = "SELECT * FROM users WHERE login = :login";

			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(':login', $login, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return false;
	}

	/**
	 * @return bool|string
	 *
	 * @Do save Image
	 */
	public function saveImage()
	{
		if (!isset($_FILES)) {
			return false;
		}

		$uploadsDir = __DIR__ . '/../../uploads';

		if (!file_exists($uploadsDir)) {
			mkdir($uploadsDir, 777, true);
		}

		foreach ($_FILES as $file) {
			if ($file['type'] != 'image/jpg' && $file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
				return false;
			}

			$dateTime = new DateTime();
			$name = (string)$dateTime->getTimestamp();
			$explodeName = explode('.', $file['name']);

			$result = move_uploaded_file($file['tmp_name'], $uploadsDir . '/' . $name . '.' . end($explodeName));

			if ($result) {
				return '/uploads/' . $name . '.' . end($explodeName);
			}
		}
	}
}