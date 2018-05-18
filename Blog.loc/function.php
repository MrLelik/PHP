<?php

use Classes\ConnectDb;
use Classes\Article;
use Classes\UserTools;
use Classes\User;

session_start();

require_once 'viewTitleFunction.php';
//require_once 'dbConnectFunction.php';

spl_autoload_register(function ($class) {
	// project-specific namespace prefix
	$prefix = 'Classes\\';
	// base directory for the namespace prefix
	$base_dir = __DIR__ . '/Classes/';
	$len = strlen($prefix);

	if (strncmp($prefix, $class, $len) !== 0) {
		return;
	}

	$relative_class = substr($class, $len);
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	if (file_exists($file)) {
		require $file;
	}
});

$articleManager = new Article(ConnectDb::getConnect());

//function getArticles()

//function getAutor()
//{
//	return $_SESSION['author'];
//}

function getAllUsers()
{
    $db = ConnectDbtest::getConnect();
    if ($db) {
        $sql = "SELECT * FROM users";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}

//function getAuthor($id)
//{
//    $db = ConnectDbtest::getConnect();
//    if ($db) {
//        $sql = "SELECT * FROM users WHERE id=$id";
//        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
//    }
//    return false;
//}

//function getSampleArticle()
//{
//    $db = ConnectDbtest::getConnect();
//    if ($db) {
//        $sql = "SELECT * FROM articles";
//
//        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
//    }
//
//    return false;
//}

function insertArticle($post)
{
    $title = ($post['title']) ? $post['title'] : null;
    $subTitle = ($post['subtitle']) ? $post['subtitle'] : null;
    $content = ($post['content']) ? $post['content'] : null;
    $date = date('F d, Y');
    $url = getUrl($post['title']);

    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "INSERT INTO articles (title, sub_title, content, created_at, author, url) 
                VALUES ( :title, :sub_title,:content, :created_at, :author, :url )";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
        $stmt->bindParam(':author', $post['authorAdd'], PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->execute();
    }
}

function getUrl($str)
{
    $articleUrl = str_replace(' ', '-', $str);
    $articleUrl = transliteration($articleUrl);
    $articleIsset = getArticleByUrl($articleUrl);
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
        return getUrl($newUrl);
    }
}

function transliteration($str)
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

function getArticleByUrl($str)
{
    $db = ConnectDbtest::getConnect();
    if ($db) {
        $sql = "SELECT * FROM articles WHERE url='$str'";

        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function updateArticle($post)
{
    $title = ($post['title']) ? $post['title'] : null;
    $subTitle = ($post['subtitle']) ? $post['subtitle'] : null;
    $content = ($post['content']) ? $post['content'] : null;
    $date = date('F d, Y');
    $id = $_SESSION['change_id'];

    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "UPDATE articles SET title = :title, sub_title = :sub_title, content = :content, created_at = :created_at WHERE articles . id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}

function deleteArticle($id)
{
    $db = ConnectDbtest::getConnect();
    if ($db) {
        $sql = "DELETE FROM articles WHERE id=$id";
        return $db->prepare($sql)->execute();
    }
    return false;
}

function addUser($post)
{
    $db = ConnectDbtest::getConnect();

    if ($db) {
        $password = md5($post['pass']);
        $sql = "INSERT INTO users (name, last_name, login, email, password, role)
                VALUES ( :name, :last_name, :registLogin, :email, :password, :role)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $post['name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $post['lastName'], PDO::PARAM_STR);
        $stmt->bindParam(':registLogin', $post['registLogin'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $post['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role', $post['role'], PDO::PARAM_STR);

        return $stmt->execute();
    }
}

function getUser($user)
{
    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':login', $user, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function getErrorMessage()
{
    return isset($_SESSION['error_message']) ? $_SESSION['error_message'] : false;
}

function validateFormLogin($post)
{
    if (!isset($post['login']) || empty($post['login'])) {
        $_SESSION['error_message'] = 'Login can not by empty';
        return;
    }

    if (!isset($post['password']) || empty($post['password'])) {
        $_SESSION['error_message'] = 'Password can not by empty';
        return;
    }

    $user = htmlspecialchars($post['login']);
    $user = trim($user);

    $password = htmlspecialchars($post['password']);
    $password = md5($password);

    if (getUser($user)) {

        $trueUser = getUser($user);

        if ($password == $trueUser['password']) {

            $_SESSION['error_message'] = false;
            $_SESSION['access'] = true;
            $_SESSION['userName'] = $trueUser['name'];
            $_SESSION['author'] = $trueUser['name'] . ' ' . $trueUser['last_name'];
            $_SESSION['authorID'] = $trueUser['id'];
            $_SESSION['role'] = $trueUser['role'];
            header('Location: /index.php');
            exit();

        } else {
            $_SESSION['error_message'] = 'Wrong password';
            $_SESSION['access'] = false;
        }

    } else {
        $_SESSION['error_message'] = 'Login not found';
        $_SESSION['access'] = false;
    }
}

function validateFormRegister($post)
{

    if ($post['pass'] !== $post['repeatPass']) {
        $_SESSION['error_message'] = 'Inputted password not confirm';
        return;
    }

    if (!isset($post['registLogin']) || empty($post['registLogin'])) {
        $_SESSION['error_message'] = 'Login can not by empty';
        return;
    }

    if (!isset($post['email']) || empty($post['email'])) {
        $_SESSION['error_message'] = 'Login can not by empty';
        return;
    }

    $post['name'] = htmlspecialchars($post['name']);
    $post['name'] = trim($post['name']);
    $post['lastName'] = htmlspecialchars($post['lastName']);
    $post['lastName'] = trim($post['lastName']);
    $post['registLogin'] = htmlspecialchars($post['registLogin']);
    $post['registLogin'] = trim($post['registLogin']);
    $post['email'] = htmlspecialchars($post['email']);
    $post['email'] = trim($post['email']);
    $post['pass'] = htmlspecialchars($post['pass']);
    $post['pass'] = trim($post['pass']);

    if (addUser($post)) {
        $_SESSION['error_message'] = false;
        header('Location: /register.php');
        exit();
    } else {
        $_SESSION['error_message'] = 'Register user not complete';
    }
}

function changeRole($data)
{
    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "UPDATE users SET role = :role WHERE users . id = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':role', $data['flag'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $data['changeID'], PDO::PARAM_STR);
        $stmt->execute();
    }
}

function getCountTable($table)
{
    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "SELECT COUNT(*) as count FROM $table";

        return $db->query($sql)->fetchColumn();
    }
}

function search($words)
{
    $db = ConnectDbtest::getConnect();

    if ($db) {
        $sql = "SELECT * FROM articles WHERE CONCAT (title , sub_title , content) LIKE :words";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':words', '%'.$words.'%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}