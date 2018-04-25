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
    </style>
</head>
<body>
<div class="container">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="slide-nav">

        <div class="navbar-header">
            <a class="navbar-toggle">
                <span class="sr-only">Открыть меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="navbar-brand" href=".">Мой магазин</a>
        </div>

        <div id="slidemenu">

            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Главная</a></li>
                <!--                <li><a href="#">Шаблоны</a></li>-->
                <!--                <li><a href="#">Плагины</a></li>-->
                <li><a href="#">Контакты</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <button type="submit" class="btn btn-default">Выход</button>
            </form>

        </div>
    </div>
    <div class="well well-sm">
        <strong>Вид: </strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-th-list"></span>Список</a>
            <a href="#" id="grid" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-th"></span>Сетка</a>
        </div>
    </div>
    <div id="products" class="row list-group">
        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="1" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 1</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1, Описание товара 1.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">$350.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="2" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 2</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2, Описание товара 2.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $250.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="3" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 3</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3, Описание товара 3.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $150.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="4" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 4</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4, Описание товара 4.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $200.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="5" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 5</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5, Описание товара 5.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $320.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://bootstraptema.ru/images/type/400x250.png" alt="6" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">Товар 6</h4>
                    <p class="group inner list-group-item-text">
                        Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6, Описание товара 6.
                    </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>