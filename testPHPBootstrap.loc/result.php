<?php
$arr_check = array("Ром", "Лимон", "Виски");

if (isset($_POST['arr_ans'])) {
    $arr = $_POST['arr_ans'];
//    echo gettype($arr_ans);
    $result = count($arr);
//    echo gettype($result);
}
foreach ($arr as $key => $value) {
    $arr[$key] = $key;
}

if (count($arr_check) >= count($arr)) {
    echo 'Ответов мало';
} else {
    echo 'Ответов много';
}
echo '<br>';
//foreach ($arr as $k => $v) {
//    echo "{$k} => {$v}";
//    echo "<br>";
//}
//var_dump($arr);
$arr_end = array_diff($arr, $arr_check);
var_dump($arr_end);

echo '<br>';

$arr_les = array_diff($arr_check, $arr);
var_dump($arr_les);


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
    <p>Правильный ответ: <?php echo $result; ?></p>
<!--    <p>Элементы:-->
<!--        --><?// foreach ($arr_ans as $item): ?>
<!--            <p>--><?//=$item?><!--</p><br>-->
<!--        --><?// endforeach; ?>
<!--    </p>-->
    <a href='index.php'>Назад</a>
</body>
</html>