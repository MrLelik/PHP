<?php
$arr = array("Лимон", "Лайм", "Ром", "Водка", "Виски", "Текилла", "Самбука");
$arr_new = array("Ром", "Водка");


$arr_constr = array_diff($arr, $arr_new);
var_dump($arr_constr);
$rand_keys = array_rand($arr_constr, 4);

foreach ($rand_keys as $k => $v) {
    $arr_sort[] = $arr_constr[$v];
}
$arr_dobl = array_merge($arr_sort, $arr_new);


shuffle($arr_dobl);


echo '<br>';
foreach ($arr_dobl as $it) {
    echo $it . '<br>';
}
//var_dump($arr_dobl);
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
    <form action="result.php" method="post">
        <div>
            <? foreach ($arr as $item): ?>
                <input type="checkbox" name="arr_ans[<?=$item?>][]"><?=$item?><br>
            <? endforeach; ?>
        </div>
        <button type="submit">Результат</button>
    </form>


</body>
</html>