<?php
require_once 'function.php';

if (isset($_SESSION['access']) && !$_SESSION['access']) {
    header('Location: /access_denied');
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
<p>Hello <?php viewUserName(); ?></p>
<a href="/?logout">logout</a>

<div class="blog">
    <?php $article = $_GET;?>
    <?php if ($article): ?>

            <div class="article">
                <h1><?= $article['title'];?></h1>
                <p><?= $article['content'];?></p>
            </div>
            <div>
                <a href="javascript:history.back(1)" title="...">Назад</a>
            </div>

    <?php else: ?>
        <p>Articles not found!!!</p>
    <?php endif; ?>
</div>
</body>
</html>