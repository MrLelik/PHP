<?php

class ModelMain extends Model
{
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
	 * @return mixed|null
	 *
	 * @Do get -> One Article and Author
	 */
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
	 * @param $data
	 *
	 * @return bool
	 *
	 * @Do Add User in mySQL
	 */
	public function addUser($data)
	{
		try {
			$sql = "INSERT INTO users (name, last_name, login, email, password, role)
                VALUES ( :name, :last_name, :registLogin, :email, :password, :role)";

			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
			$stmt->bindParam(':last_name', $data['lastName'], PDO::PARAM_STR);
			$stmt->bindParam(':registLogin', $data['registLogin'], PDO::PARAM_STR);
			$stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
			$stmt->bindParam(':password', $data['pass'], PDO::PARAM_STR);
			$stmt->bindParam(':role', $data['role'], PDO::PARAM_STR);

			return $stmt->execute();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return false;
	}

	/**
	 * @param $data
	 *
	 * @return bool
	 *
	 * @Do data checking and call method addUser
	 */
	public function validateFormRegister($data)
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

		if ($this->getUser($data['registLogin'])) {
			$_SESSION['error_message'] = 'Login is not available';

			return false;
		}

		return $this->addUser($this->clean($data));
	}

	/**
	 * @param $data
	 *
	 * @return array
	 *
	 * @Do data cleaning
	 */
	public function clean($data)
	{
		$data         = array_map(function ($d) {
			return stripcslashes(trim($d));
		}, $data);
		$data['pass'] = $this->hash($data['pass']);

		return $data;
	}

	/**
	 * @param $value
	 *
	 * @return string
	 *
	 * @Do password hashing
	 */
	public function hash($value)
	{
		return md5($value);
	}

	/**
	 * @return bool
	 *
	 * @Do get Error
	 */
	public function getErrorMessage()
	{
		return isset($_SESSION['error_message']) ? $_SESSION['error_message']
			: false;
	}

	/**
	 * @Do delete All Error
	 */
	public function cleanError()
	{
		$_SESSION['error_message'] = false;
	}

	public function trueRegister()
	{
		$_SESSION['error_message'] = 'Registration is successful';
	}
}