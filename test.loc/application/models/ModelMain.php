<?php

class ModelMain extends Model
{
	/**
	 * @return array|null
	 * get -> All Articles and Author
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
	 * get -> One Article (URL) and Author
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

	public function getSomeOneNews()
	{
		$data = null;
		try {
			$data = $this->connect()
			             ->query("SELECT * FROM articles INNER JOIN users ON articles.author = users.id")
			             ->fetch(PDO::FETCH_OBJ);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $data;
	}
}