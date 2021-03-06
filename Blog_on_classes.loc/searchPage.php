<?php require_once 'header.php'; ?>
<?php
use Classes\ConnectDb;
use Classes\Article;
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Search Results</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
	            <?php $articles = $articleManager->search($_SESSION['words']); ?>
                <?php if ($articles): ?>
                    <?php foreach ($articles as $article): ?>
                        <?php $author = $articleManager->getAuthor($article->author); ?>
                        <div class="post-preview">
                            <a href="samplePost.php?url=<?= $article->url;?>">
                                <h2 class="post-title">
                                    <?= $article->title; ?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?= $article->sub_title; ?>
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#"><?= $author->login; ?></a>
                                on <?= $article->created_at; ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Products not found!!!</p>
                <?php endif; ?>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php require_once 'footer.php'; ?>