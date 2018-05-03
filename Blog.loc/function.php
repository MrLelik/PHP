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
    $posted = ['Harry', 'Oliver',
        'Jack', 'Thomas', 'William',
        'James', 'Amelia', 'Olivia',
        'Jessica', 'Emily', 'Lily',
        'Mia', 'Isabella'];

    return $posted[random_int(0, count($posted) - 1)];
}


function getDates()
{
    $randDay = random_int(0, 300);
    return date('F d, Y', strtotime("-$randDay days"));
}


function getArticlesBlog()
{
    $arr = [];
    for ($i = 1; $i <= 5; $i++) {
        $arr[] = [
            'articleTitle' => 'Some interesting article about something interesting ' . $i,
            'textTitle' => 'The text is very, very interesting article ' . $i,
            'author' => getAutor(),
            'date' => getDates()
        ];
    }
    return $arr;
}

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