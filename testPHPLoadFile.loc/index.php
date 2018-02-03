<?php
$connect = new mysqli('localhost','root','','dbname');
    if ($connect->connect_errno) {
        die('Sorry! Database connection error.');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load foto</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
        <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
    <form enctype="multipart/form-data" action="__URL__" method="POST">
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл: <input name="userfile" type="file" />
        <input type="submit" value="Send File" />
    </form>
</body>
</html>