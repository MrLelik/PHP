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
<?php
$arr_cocrails = array(
    array(
        "name" => "LongAlend",
        "img" => "img/pic1.jpg",
        "ingredients" => array("Водка", "Лимон", "Ром")
    ),
    array(
        "name" => "GoldIce",
        "img" => "pic2.jpg",
        "ingredients" => array("Текилла", "Вермут", "Джин")
    )
);
$picture = $arr_cocrails[0]["img"];
echo $picture;
//var_dump($arr_cocrails[0]['ingredients']);
?>

<img src="<?php echo $picture ?>" >
</body>
</html>