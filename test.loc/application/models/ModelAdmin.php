<?php

class ModelAdmin extends Model
{
	public function getCountTable($table)
	{
		$count = null;
		try {
			$count = $this->connect()
			              ->query("SELECT COUNT(*) as count FROM $table")
			              ->fetchColumn();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $count;
	}

	public function getAllUsers()
	{
		$data = null;
		try {
			$data = $this->connect()
			             ->query("SELECT * FROM users")
			             ->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return $data;
	}

	public function addArticle($data)
	{
		$title = ($data['title']) ? $data['title'] : null;
		$subTitle = ($data['subtitle']) ? $data['subtitle'] : null;
		$content = ($data['content']) ? $data['content'] : null;
		$data = date('F d, Y');
		$url = $this->getUrl($data['title']);
		$author = $this->getUser($_SESSION['login']);
		$author = $author->id;

		if ($this->connect()) {
			$sql = "INSERT INTO articles (title, sub_title, content, created_at, author, url) VALUES ( :title, :sub_title,:content, :created_at, :author, :url )";
			$stmt = $this->connect()->prepare($sql);
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':created_at', $data, PDO::PARAM_STR);
			$stmt->bindParam(':author', $author, PDO::PARAM_STR);
			$stmt->bindParam(':url', $url, PDO::PARAM_STR);
			$result = $stmt->execute();
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

	public function getArticleByUrl($str)
	{
		try {
			$sql = "SELECT * FROM articles WHERE url='$str'";
			return $this->connect()->query($sql)->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return false;
	}

	/**
	 * @param $url
	 *
	 * @return bool
	 *
	 * @Do Delete Post by URL
	 */
	public function deleteArticle($url)
	{
		try {
			$sql = "DELETE FROM articles WHERE url='$url'";
			return $this->connect()->prepare($sql)->execute();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

		return false;
	}

	public function changeRole($id, $role)
	{
		try {
			$sql = "UPDATE users SET role = :role WHERE users . id = :id";
			$stmt = $this->connect()->prepare($sql);

			$stmt->bindParam(':role', $role, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

	}

	public function updateArticle($data, $url)
	{
		$filePath = null;

		if (isset($_FILES)) {
			$filePath = $this->saveImage();
		}

		if ($filePath != null) {
			$article = $this->getContentOneNews($url);
			if ($article->image) {
				unlink(__DIR__ . '/../../' . $article['image']);
			}
		}

		$title = ($data['title']) ? $data['title'] : null;
		$subTitle = ($data['subtitle']) ? $data['subtitle'] : null;
		$content = ($data['content']) ? $data['content'] : null;
		$data = date('F d, Y');

		try {
			$sql = "UPDATE articles 
					SET title = :title, sub_title = :sub_title, content = :content, created_at = :created_at, image = :image 
					WHERE articles . url = :url";
			$stmt = $this->connect()->prepare($sql);
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':created_at', $data, PDO::PARAM_STR);
			$stmt->bindParam(':image', $filePath, PDO::PARAM_STR);
			$stmt->bindParam(':url', $url, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}

	}

	/**
	 * @param $str
	 *
	 * @return string
	 *
	 * @Do Russian to English replacement
	 */
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