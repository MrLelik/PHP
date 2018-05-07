<?php
require_once 'db.php';

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
<div>
    <pre>
        <?php
        $result = getUser('lelik');
        if (count($result) == 0) {
            echo 'массив пуст';
        } else {
            var_dump($result);
            echo $result['name'];
            echo $result['password'];
        }
        ?>
    </pre>
</div>
</body>
</html>