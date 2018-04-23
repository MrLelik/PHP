<?php
session_start();
require_once 'functionBlog.php';

const LOGIN = 'lelik';
const PASSWORD = 'qqq';

function login(array $post)
{
    $check = null;
    if (isset($post['login']) && isset($post['password'])) {
        if ($post['login'] == LOGIN && md5($post['password']) == md5(PASSWORD))
            $check = true;
    }

    if ($check) {
        $_SESSION['access'] = true;
        $_SESSION['login'] = $post['login'];
        header('Location: /blog.php');
        exit();
    } else {
        $_SESSION['access'] = false;
        header('Location: /access_denied.php');
        exit();
    }
}

function viewUserName()
{
    echo isset($_SESSION['login']) ? $_SESSION['login'] : null;
}