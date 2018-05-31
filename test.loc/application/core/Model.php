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
}