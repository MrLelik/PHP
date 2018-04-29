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
        header('Location: /index.php');
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

    switch ($_SERVER['REQUEST_URI']) {
        case '/':
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

function viewTitle2()
{
    $titleHome = 'Custom Blog';
    $titleAbout = 'Custom Blog - About';
    $titleSamplePost = 'Custom Blog - Post';
    $titleContact = 'Custom Blog - Contact';

    if ($_SERVER['REQUEST_URI'] === '/') {
        echo $titleHome;
    } elseif (strpos($_SERVER['REQUEST_URI'], 'about' )) {

    }
}