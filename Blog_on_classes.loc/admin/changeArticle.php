<?php require_once 'header.php'; ?>
<?php
use Classes\ConnectDb;
use Classes\Article;
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--<a href="#">Add title</a>-->
                <i class="fa fa-pencil-square-o"></i> Change Article
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-newspaper-o"></i> <?= ConnectDb::getCountTable('articles'); ?> Articles
            </div>
            <div class="list-group list-group-flush small">
	            <?php $articles = $articleManager->getArticles(); ?>
                <?php if ($articles): ?>
                    <?php foreach ($articles as $article): ?>
		                <?php $author = $articleManager->getAuthor($article->author); ?>
                        <a class="list-group-item list-group-item-action" href="#">
                            <div class="media">
                                <div class="media-body">
                                    <h4><strong><?= $article->title;
                                    ?></strong></h4>
                                    <p><?= $article->sub_title; ?></p>
                                    posted a new article to
                                    <strong><?= $author->login; ?></strong>.
                                    <div class="text-muted smaller"><?= $article->created_at; ?></div>
                                </div>
                            </div>
                        </a>
                        <a class="btn btn-info" href="changeSampleArticle.php?changeUrl=<?= $article->url;?>">Change</a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Articles not found!</p>
                <?php endif; ?>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php require_once 'footer.php'; ?>
