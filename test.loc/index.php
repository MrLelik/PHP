<?php
require_once 'function.php';

    if (isset($_GET) && key_exists('logout', $_GET)) {
            session_destroy();
            header('Location: /');
            exit();
    }

    if (isset($_POST) && !empty($_POST)) {
        login($_POST);
    }

    if (isset($_SESSION['access']) && $_SESSION['access']) {
        header('Location: /blog.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/" method="post">
        <input type="text" name="login" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <input type="submit">
    </form>
</body>
</html>

