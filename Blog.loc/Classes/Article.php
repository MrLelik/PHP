<?php

namespace Classes;

use PDO;

class Article
{
	/**
	 * @var PDO
	 */
	private $connect;

	public function __construct($connect)
	{
		$this->connect = $connect;
	}

	/**
	 * Возвращение всех статей
	 * @return array|bool
	 */
	public function getArticles()
	{
		if ($this->connect) {
			$sql = "SELECT * FROM articles";

			return $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
		}

		return false;
	}

	public function getSampleArticle()
	{
		if ($this->connect) {
			$sql = "SELECT * FROM articles";

			return $this->connect->query($sql)->fetch(PDO::FETCH_OBJ);
		}

		return false;
	}

	public function getArticleByUrl($str)
	{
		if ($this->connect) {
			$sql = "SELECT * FROM articles WHERE url='$str'";

			return $this->connect->query($sql)->fetch(PDO::FETCH_OBJ);
		}
		return false;
	}

	public function getAuthor($id)
	{
		if ($this->connect) {
			$sql = "SELECT * FROM users WHERE id='$id'";

			return $this->connect->query($sql)->fetch(PDO::FETCH_OBJ);
		}
	}

	public function getAuthorLogin($login)
	{
		if ($this->connect) {
			$sql = "SELECT * FROM users WHERE login='$login'";

			return $this->connect->query($sql)->fetch(PDO::FETCH_OBJ);
		}
	}

	public function insertArticle($date)
	{
		$title = ($date['title']) ? $date['title'] : null;
		$subTitle = ($date['subtitle']) ? $date['subtitle'] : null;
		$content = ($date['content']) ? $date['content'] : null;
		$date = date('F d, Y');
		$url = $this->getUrl($date['title']);
		$author = $this->getAuthorLogin($_SESSION['login']);
		$author = $author->id;


		if ($this->connect) {
			$sql = "INSERT INTO articles (title, sub_title, content, created_at, author, url) 
                VALUES ( :title, :sub_title,:content, :created_at, :author, :url )";
			$stmt = $this->connect->prepare($sql);
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
			$stmt->bindParam(':author', $author, PDO::PARAM_STR);
			$stmt->bindParam(':url', $url, PDO::PARAM_STR);
			$stmt->execute();
		}
	}

	public function getUrl($str)
	{
		$articleUrl = str_replace(' ', '-', $str);
		$articleUrl = $this->transliteration($articleUrl);
		$articleIsset = $this->getArticleByUrl($articleUrl);
		if (!$articleIsset) {
			return $articleUrl;
		} else {
			$url = $articleIsset['url'];
			$exUrl = explode('-', $url);
			if ($exUrl){
				$temp = (int)end($exUrl);
				$newUrl = $exUrl[0] . '-'. ++$temp;
			} else {
				$temp = 0;
				$newUrl = $articleUrl . '-'. ++$temp;
			}
			return $this->getUrl($newUrl);
		}
	}


	public function updateArticle($date, $url)
	{
		$title = ($date['title']) ? $date['title'] : null;
		$subTitle = ($date['subtitle']) ? $date['subtitle'] : null;
		$content = ($date['content']) ? $date['content'] : null;
		$date = date('F d, Y');


		if ($this->connect) {
			$sql = "UPDATE articles SET title = :title, sub_title = :sub_title, content = :content, created_at = :created_at WHERE articles . url = :url";
			$stmt = $this->connect->prepare($sql);
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
			$stmt->bindParam(':url', $url, PDO::PARAM_STR);
			$stmt->execute();
		}
	}


	public function deleteArticle($url)
	{
		if ($this->connect) {
			$sql = "DELETE FROM articles WHERE url='$url'";
			return $this->connect->prepare($sql)->execute();
		}
		return false;
	}

	public function getAllUsers()
	{
		if ($this->connect) {
			$sql = "SELECT * FROM users";

			return $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
		}

		return false;
	}

	public function changeRole($data)
	{
		if ($this->connect) {
			$sql = "UPDATE users SET role = :role WHERE users . id = :id";

			$stmt = $this->connect->prepare($sql);

			$stmt->bindParam(':role', $data['flag'], PDO::PARAM_STR);
			$stmt->bindParam(':id', $data['changeID'], PDO::PARAM_STR);
			$stmt->execute();
		}
	}

	public function search($words)
	{
		if ($this->connect) {
			$sql = "SELECT * FROM articles WHERE CONCAT (title , sub_title , content) LIKE :words";
			$stmt = $this->connect->prepare($sql);
			$stmt->bindValue(':words', '%'.$words.'%', PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		return false;
	}

	public function transliteration($str)
	{
		$st = strtr($str,
			array(
				'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
				'е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i',
				'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o',
				'п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
				'ф'=>'ph','х'=>'h','ы'=>'y','э'=>'e','ь'=>'',
				'ъ'=>'','й'=>'y','ц'=>'c','ч'=>'ch', 'ш'=>'sh',
				'щ'=>'sh','ю'=>'yu','я'=>'ya',' '=>'_', '<'=>'_',
				'>'=>'_', '?'=>'_', '"'=>'_', '='=>'_', '/'=>'_',
				'|'=>'_'
			)
		);
		$st2 = strtr($st,
			array(
				'А'=>'a','Б'=>'b','В'=>'v','Г'=>'g','Д'=>'d',
				'Е'=>'e','Ё'=>'e','Ж'=>'zh','З'=>'z','И'=>'i',
				'К'=>'k','Л'=>'l','М'=>'m','Н'=>'n','О'=>'o',
				'П'=>'p','Р'=>'r','С'=>'s','Т'=>'t','У'=>'u',
				'Ф'=>'ph','Х'=>'h','Ы'=>'y','Э'=>'e','Ь'=>'',
				'Ъ'=>'','Й'=>'y','Ц'=>'c','Ч'=>'ch', 'Ш'=>'sh',
				'Щ'=>'sh','Ю'=>'yu','Я'=>'ya'
			)
		);
		$translit = $st2;
		return $translit;
	}
}