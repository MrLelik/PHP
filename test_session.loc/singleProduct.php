<?php
require_once 'function.php';

if (!isset($_SESSION['access']) && !$_SESSION['access']) {
    header('Location: /access_denied.php');
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
    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
    <link rel="stylesheet" href="http://bootstraptema.ru/snippets/menu/2016/slidemenu/slidemenu.css" />
    <script src="http://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
    <script src="http://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
    <script src="http://bootstraptema.ru/snippets/menu/2016/slidemenu/slidemenu.js"></script>
    <title>Мой магазин</title>

    <style>
        .glyphicon { margin-right:5px; }
        .thumbnail {
            margin-bottom: 20px;
            padding: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px
        }

        .item.list-group-item {
            float: none;
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px
        }
        .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover {
            background: rgb(105,65,152)
        }
        .item.list-group-item .list-group-image {
            margin-right: 10px
        }
        .item.list-group-item .thumbnail {
            margin-bottom: 0px
        }
        .item.list-group-item .caption {
            padding: 9px 9px 0px 9px
        }
        .item.list-group-item:nth-of-type(odd) {
            background: #eeeeee
        }
        .item.list-group-item:before, .item.list-group-item:after {
            display: table;
            content: " "
        }
        .item.list-group-item img {
            float: left
        }
        .item.list-group-item:after {
            clear: both
        }
        .list-group-item-text {
            margin: 0 0 11px
        }
        .pd1 {
            margin-top: 80px;
        }
        .st1 {
            margin-left: 420px;
        }
        .pr1 {
            margin-left: 20px;
            margin-top: 120px;
        }
        .et1 {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="slide-nav">
        <div class="navbar-header">
            <a class="navbar-brand" href=".">Мой магазин</a>
        </div>

        <div id="slidemenu">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <li><a href="feedback.php">Контакты</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <a href="/?logout" class="btn btn-default et1">Выход</a>
            </form>
        </div>
    </div>

    <div id="products" class="row list-group pd1">
        <?php
        $product = $_GET;

        if ($product) {
            saveOrder($product);
        }
        ?>
        <?php if ($product): ?>

            <div class="item col-xs-12 col-lg-10">
                <div class="thumbnail">
                    <img class="group list-group-image pull-left" src="http://bootstraptema.ru/images/type/400x250.png" alt="1" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading st1"><?= $product['title']; ?></h4>
                        <p class="group inner list-group-item-text st1"><?= $product['description']; ?></p>
                        <div class="row">
                            <div class="col-xs-8 col-md-4">
                                <p class="lead pr1"><?= $product['price']; ?></p>
                            </div>
                            <div class="col-xs-10 col-md-12">
                                <a class="btn btn-success pull-right" href="order.php">Заказать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <p>Product not found!!!</p>
        <?php endif; ?>
    </div>

</div>
</body>
</html>