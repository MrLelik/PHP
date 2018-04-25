<?php
session_start();
require_once 'functionScore.php';

const LOGIN = 'lelik';
const PASSWORD = 'qqq';
const USEREMAIL = 'lelik@gmail.com';
const ADMINEMAIL = 'admin@gmail.com';

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
        $_SESSION['email'] = USEREMAIL;
        header('Location: /my_score.php');
        exit();
    } else {
        $_SESSION['access'] = false;
        header('Location: /access_denied.php');
        exit();
    }
}