<?php
session_start();

const LOGIN = 'lelik';
const PASSWORD = 'qqq';

function login(array $post)
{
    $check = null;

    if (isset($post['login']) && isset($post['password'])) {
        if ($post['login'] == LOGIN && md5($post['password']) == md5(PASSWORD)) {
            $check = true;
        }
    }

    if ($check) {
        $_SESSION['access'] = true;
        $_SESSION['login'] = $post['login'];
        header('Location: /');
        exit();
    } else {
        $_SESSION['access'] = false;
        header('Location: /login.php');
        exit();
    }
}

function viewTitle()
{
    $titleHome = 'Custom Blog';
    $titleAbout = 'Custom Blog - About';
    $titleSamplePost = 'Custom Blog - Post';
    $titleContact = 'Custom Blog - Contact';
    $titleLogin = 'Custom Blog - Login';

    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            echo $titleHome;
            break;
        case '/login.php':
            echo $titleLogin;
            break;
        case '/index.php':
            echo $titleHome;
            break;
        case '/about.php':
            echo $titleAbout;
            break;
        case '/samplePost.php':
            echo $titleSamplePost;
            break;
        case '/contact.php':
            echo $titleContact;
            break;
        default:
            echo 'Default case';
            break;
    }
}


function getAutor()
{
    $autor = 'MrLelik';
    return $autor;
}


//function getDates()
//{
//    $randDay = random_int(0, 300);
//    return date('F d, Y', strtotime("-$randDay days"));
//}


//function getArticlesBlog()
//{
//    $arr = [];
//    for ($i = 1; $i <= 5; $i++) {
//        $arr[] = [
//            'articleTitle' => 'Some interesting article about something interesting ' . $i,
//            'textTitle' => 'The text is very, very interesting article ' . $i,
//            'author' => getAutor(),
//            'date' => getDates()
//        ];
//    }
//    return $arr;
//}

function connectDb()
{
    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'custom_blog';
    $db_user = 'admin';
    $db_pass = '123';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $dbh = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}


function getArticles()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}

function getSampleArticle()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT * FROM articles";

        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    return false;
}

function insertArticle($post)
{
    $title = ($post['title']) ? $post['title'] : null;
    $subTitle = ($post['subtitle']) ? $post['subtitle'] : null;
    $content = ($post['content']) ? $post['content'] : null;
    $date = date('F d, Y');

    $db = connectDb();

    if ($db) {
        $sql = "INSERT INTO articles (title, sub_title, content, created_at) VALUES ( :title, :sub_title,:content, :created_at )";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $subTitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
        $stmt->execute();
    }
}

function updateArticle($post)
{
    $title = ($post['title']) ? $post['title'] : null;
    $subTitle = ($post['subtitle']) ? $post['subtitle'] : null;
    $content = ($post['content']) ? $post['content'] : null;
    $date = date('F d, Y');
    $id = $_SESSION['change_id'];

    $db = connectDb();

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
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles WHERE id=$id";
        return $db->prepare($sql)->execute();
    }
    return false;
}


//function viewTitle2()
//{
//    $titleHome = 'Custom Blog';
//    $titleAbout = 'Custom Blog - About';
//    $titleSamplePost = 'Custom Blog - Post';
//    $titleContact = 'Custom Blog - Contact';
//
//    if ($_SERVER['REQUEST_URI'] === '/') {
//        echo $titleHome;
//    } elseif (strpos($_SERVER['REQUEST_URI'], 'about' )) {
//
//    }
//}