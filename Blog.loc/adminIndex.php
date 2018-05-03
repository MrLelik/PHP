<?php require_once 'adminHeader.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid">
<!--        Articles-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="nav-link" href="adminAddArticle.php">
                    <i class="fa fa-plus-square-o"></i> Add Articles</a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-newspaper-o"></i> All Articles
            </div>
            <div class="list-group list-group-flush small">
                <?php if (getArticles()): ?>
                    <?php foreach (getArticles() as $article): ?>
                        <a class="list-group-item list-group-item-action" href="adminChangeSampleArticle.php?title=<?= $article['title'];?> &sub_title=<?= $article['sub_title'];?> &content=<?= $article['content'];?> &change_id=<?= $article['id'];?>">
                            <div class="media">
                                <!--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">-->
                                <div class="media-body">
                                    <h4><strong><?= $article['title']; ?></strong></h4>
                                    <p><?= $article['sub_title']; ?></p>
                                    posted a new article to
                                    <strong><?= getAutor(); ?></strong>.
                                    <div class="text-muted smaller"><?= $article['created_at']; ?></div>
                                </div>
                            </div>
                        </a>
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
<?php require_once 'adminFooter.php'; ?>
