<?php

function isUser()
{
    return isset($_COOKIE['auth']);
}

function getUser()
{
    return $_COOKIE['auth'];
}

if (!isUser()) {
    header('Location: /form.html');
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Hello, <?php echo getUser(); ?>!</h1>
                <a href="/logout.php" class="btn btn-danger">Exit</a>
            </div>
        </div>
    </div>
</body>
</html>
