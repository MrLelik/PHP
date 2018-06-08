<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>SourceIT Hometask</title>
    <style>
        body {
            background-color: #5e5e5e;
        }
        .buttons {
            margin: 0 auto;
            padding-left: 10%;
            padding-top: 3%;
        }
        .descr {
            display: none;
            margin-left: -410px;
            padding: 10px;
            margin-top: 17px;
            background: #49ffe2;
            height: 400px;
            border-radius: 8px;
            -moz-box-shadow: 0 5px 5px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0 5px 5px rgba(0, 0, 0, 0.3);
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.3);
        }
        .buttons:hover .descr{
            display:block;
            position:absolute;
            top:25px;
            z-index:9999;
            width:400px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task1/index.php">Hometask 1</a>
                <div class="descr">
                            <p>Домашнее задание 30.03.2018</p>
                            <p>Создание переменных.</p>
                            <p>Создание массивов.</p>
                            <p>Работа с циклом for.</p>
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task2/index.php">Hometask 2</a>
                <div class="descr">
                    <p>Домашнее задание 03.04.2018</p>
                    <p>1.  Перевод в верхний регистр средствами пхп.</p>
                    <p>2. Перевод числа из метров в километры.</p>
                    <p>4. *** Напишите функцию которая будет принимать на вход два числа, и будет выводить на экран болшее.</p>
                    <p>5. *** Напишите функцию, которая примет на вход массив, и выведет самое большое число</p>
                    <p>6. *** Задание со звездочкой, вывести в браузер “ряд фибоначчи”</p>
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task3/index.php">Hometask 3</a>
                <div class="descr">
                    06.04.2018
                    Реализуйте самостоятельно функции:
                    strlen()
                    empty()
                    trim()
                    intval()
                    implode()
                    explode()
                    array_merge()
                    array_unique()
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task4/index.php">Hometask 4 myRound</a>
                <div class="descr">
                    Function MyRound
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task5/index.php">Hometask 5</a>
                <div class="descr">
                    <p>16.04.2018</p>
                    <p>array_key_exists()</p>
                    <p>array_keys()</p>
                    <p>array_combine()</p>
                    <p>array_search()</p>
                    <p>in_array()</p>
                    <p>array_diff()</p>
                    <p>array_intersect()</p>
                    <p>sort()</p>
                    <p>max()*</p>
                    <p>min()*</p>
                    <p>round()*</p>
                </div>
            </div>
            <div class="buttons">
                <a class="btn btn-success" href="tasks/task6/index.php">My SESSION</a>
                <div class="descr">
                    <p>Многостраничность</p>
                    <p>Сохранение значений в SESSION</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>