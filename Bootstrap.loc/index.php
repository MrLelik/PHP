<?php
include __DIR__ . '/arr.php';

$arr_di = array_diff($arr_defalt, $arr_true);

$arr_key = array_rand($arr_di, 4);

foreach ($arr_key as $k => $v) {
    $arr_di_key[] = $arr_di[$v];
}

$arr_mer = array_merge($arr_di_key, $arr_true);

shuffle($arr_mer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3</title>
    <link rel="stylesheet" href="css/solar.css">

    <style>
        /*.col-md-3, .col-md-4, .col-md-8, .col-md-12*/
        /*{*/
        /*border: 1px solid #ccc;*/
        /*height: auto;*/
        /*}*/
        img {
            display: block;
            height: auto;
            max-width: 100%;
        }
        .check {
            padding-left: 5%;
            padding-top: 5%;
        }
        .name {
            padding-left: 5%;
        }
        .but {
            padding-top: 30px;
        }
    </style>

</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-4">
            <img src="cat.jpg" class="img-rounded">
        </div>
        <div class="col-md-8">
            <div class="name">
                <h1>Название</h1>
            </div>
            <form action="func.php" method="post">
                <div class="check">
                    <? foreach ($arr_mer as $item): ?>
                        <label class="checkbox inline">
                            <input type="checkbox" name="arr_ans[<?=$item?>][]"><?=$item?>
                        </label>
                    <? endforeach; ?>
                </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-1 col-md-offset-11">
            <div class="but">
                <button type="submit" class="btn btn-success">Подтвердить</button>
            </div>
        </div>
    </div>
            </form>
</div>

<script src="js/bootstrap.js"></script>
</body>
</html>