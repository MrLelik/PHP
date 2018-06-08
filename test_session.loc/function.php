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
        header('Location: /my_shop.php');
        exit();
    } else {
        $_SESSION['access'] = false;
        header('Location: /access_denied.php');
        exit();
    }
}

function sendMailOrder()
{
    $to = ADMINEMAIL;
    $subject = 'the subject';
    $message = $_SESSION['title'] . ' ' . $_SESSION['description'] . ' ' . $_SESSION['price'];

    mail($to, $subject, $message);
    echo 'Заказ оформлен';
}

function sendMailFeedback($post)
{
    $to = ADMINEMAIL;
    $subject = $post['subjectFeedback'];
    $message = 'Сообщение от ' . $post['nameFeedback'] . ' Комментарий ' . $post['commentFeedback'];

    mail($to, $subject, $message);
    echo 'Письмо отправлено';
}

function saveOrder(array $product)
{
    $_SESSION['title'] = $product['title'];
    $_SESSION['description'] = $product['description'];
    $_SESSION['price'] = $product['price'];
}