<?php require_once 'function.php'?>
<?php $result = calk(); ?>
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
<form action="/" method="POST">
    <p><b>Custom calc</b></p>
    <p><input type="number" name="val1" value="<?php echo isset($_POST['val1']) ? $_POST['val1'] : '' ?>"><Br></p>
    <input type="radio" name="operand" value="*">*<Br>
    <input type="radio" name="operand" value="/">/<Br>
    <input type="radio" name="operand" value="+">+<br>
    <input type="radio" name="operand" value="-">-</p>
    <p><input type="number" name="val2" value="<?php echo isset($_POST['val2']) ? $_POST['val2'] : '' ?>"><Br></p>
    <p><input type="submit"></p>
</form>
<p> Result: <?php echo $result; ?></p>
</body>
</html>