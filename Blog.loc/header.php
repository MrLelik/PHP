<?php
require_once 'function.php';
viewTitle();
if (isset($_GET) && key_exists('logout', $_GET)) {
    session_destroy();
    header('Location: /login.php');
    exit();
}

if (isset($_POST['go']) && !empty($_POST['words'])) {
    $_SESSION['words'] = $_POST['words'];
    header('Location: /searchPage.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php ;?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <!-- Стиль строки поиска -->
    <link rel="stylesheet" href="vendor/bootstrap/css/search.css" type="text/css">
</head>

<body>

<!-- Navigation -->
<?php require_once 'nav.php'?>