<?php
require_once 'function.php';

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

    <title><?php viewTitle();?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">

    <style>
        #search-block-form{
            width:248px;
            height:28px;
            border-radius:15px;
            border: #c4c3cf solid 1px;
            /*background:url(images/searchBg.png) left top repeat-x;*/
        }
        .focus-active{
            border-color:#aaa !important;
            background:#fff !important;
        }
        #search-block-form input{
            padding:0;
            margin:0;
            display:block;
            border:none;
            outline:none;
            background:none;
            width:100%;
            height:100%;
        }
        #search-block-form .form-actions{
            width:28px;
            height:28px;
            float:right;
            background:url(images/searchIcon.png) 5px 2px no-repeat;
        }
        #search-block-form .form-actions input:hover{
            cursor:pointer;
        }
        #search-block-form .form-actions input{
            overflow:hidden;
            text-indent:-9999px;
        }
        #search-block-form .form-item{
            width:210px;
            padding:0px 5px;
            float:right;
            height:28px;
        }
        #search-block-form .form-item input{
            font:13px/16px "Trebuchet MS", Arial, Helvetica, sans-serif;
            color: #ececf6;
            height:auto !important;
            padding:6px 0;
        }
        .placeholder{color:#cbcbcb !important;}
    </style>
</head>

<body>

<!-- Navigation -->
<?php require_once 'nav.php'?>