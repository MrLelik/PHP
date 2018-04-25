<?php
require_once 'function.php';

if (isset($_SESSION['access']) && !$_SESSION['access']) {
    header('Location: /access_denied.php');
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
        <?php $articles = getArticles();?>

        <?php if ($articles): ?>

            <?php foreach ($articles as $article): ?>

                <div class="article">
                    <a href="singleArticle.php?title=<?= $article['title']; ?>&content=<?= $article['content']?>">
                        <h1><?= $article['title'];?></h1>
                    </a>
                    <p><?= $article['content'];?></p>
                </div>

            <?php endforeach; ?>

        <?php else: ?>
            <p>Articles not found!!!</p>
        <?php endif; ?>
    </div>
</body>
</html>