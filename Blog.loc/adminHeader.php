<?php
require_once 'function.php';

if (!isset($_SESSION['access']) || !$_SESSION['access']) {
    header('Location: /login.php');
    exit();
}

if (isset($_POST['addArticle'])) {
    insertArticle($_POST);
    unset($_POST['addArticle']);
    header('Location: /adminIndex.php');
    exit();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    deleteArticle($_GET['id']);
    unset($_GET['id']);
    header('Location: /adminDeleteArticle.php');
    exit();
};

if (isset($_POST['changeArticle'])) {
    updateArticle($_POST);
    unset($_POST['changeArticle']);
    unset($_SESSION['change_id']);
    header('Location: /adminChangeArticle.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="adminIndex.php">MyBlog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="adminIndex.php">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="adminAddArticle.php">
                    <i class="fa fa-plus-square-o"></i>
                    <span class="nav-link-text">Add Article</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="adminChangeArticle.php">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="nav-link-text">Change Article</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="adminDeleteArticle.php">
                    <i class="fa fa-minus-square-o"></i>
                    <span class="nav-link-text">Delete Article</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" href="index.php">
                    <i class="fa fa-mail-reply"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"  href="index.php">
                    <i class="fa fa-mail-reply"></i> Back To MyBlog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>