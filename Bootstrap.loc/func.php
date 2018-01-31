<?php
include __DIR__ . '/arr.php';

$arr = $_POST['arr_ans'];

foreach ($arr as $key => $value) {
    $arr[$key] = $key;
}
//var_dump($arr);
$arr_lot = array_diff($arr, $arr_true);

$arr_few = array_diff($arr_true, $arr);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/solar.css">
    <title>Document</title>
    <style>
        .but {
            padding-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2><p class="text-center text-primary">Правильные:</p></h2>
                <? foreach ($arr_true as $item): ?>
                    <label class="checkbox inline">
                        <h3><p class="text-success text-center"><?=$item?></p></h3>
                    </label>
                <? endforeach; ?>
            </div>
            <div class="col-md-3">
                <h2><p class="text-center text-primary">Выбранные:</p></h2>
                <? foreach ($arr as $item): ?>
                    <label class="checkbox inline">
                        <h3><p class="text-warning text-center"><?=$item?></p></h3>
                    </label>
                <? endforeach; ?>
            </div>
            <div class="col-md-3">
                <h2><p class="text-center text-primary">Лишние:</p></h2>
                <? foreach ($arr_lot as $item): ?>
                    <label class="checkbox inline">
                        <h3><p class="text-warning text-center"><?=$item?></p></h3>
                    </label>
                <? endforeach; ?>
            </div>
            <div class="col-md-3">
                <h2><p class="text-center text-primary">Пропущенные:</p></h2>
                <? foreach ($arr_few as $item): ?>
                    <label class="checkbox inline">
                        <h3><p class="text-warning text-center"><?=$item?></p></h3>
                    </label>
                <? endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-md-offset-5 but">
                <a class="btn btn-info" href="index.php">Назад</a>
            </div>
        </div>
    </div>
</body>
</html>