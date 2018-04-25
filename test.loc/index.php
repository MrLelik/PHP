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
        .bt1 {
            margin-left: 250px;
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
                <li class="active"><a href="/">Главная</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <a href="/?logout" class="btn btn-default et1">Выход</a>
            </form>

        </div>
    </div>

    <div id="products" class="row list-group pd1">

        <form class="form-horizontal bt1" role="form">
            <div class="form-group">
                <label class="col-sm-2 control-label">Название</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Название">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Описание">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Цена</label>
                <div class="col-sm-5">
                    <p class="form-control-static">$300.000</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Почта</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" placeholder="Почта">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-7">
                    <button type="submit" class="btn btn-success pull-right">Заказать</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>