<?php require_once 'header.php';?>
<!-- Page Header -->
<?php $sampleArticle = ($_GET) ? $_GET : getSampleArticle(); ?>
<?php if ($sampleArticle): ?>
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $sampleArticle['title']; ?></h1>
                    <h2 class="subheading"><?= $sampleArticle['sub_title']; ?></h2>
                    <span class="meta">Posted by
                <a href="#"><?= isset($sampleArticle['autor']) ? $sampleArticle['autor'] : getAutor(); ?></a>
                on <?= isset($sampleArticle['date']) ? $sampleArticle['date'] : $sampleArticle['created_at']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $sampleArticle['content']; ?>
            </div>
        </div>
    </div>
</article>
<?php else: ?>
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Article not found</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
<?php require_once 'footer.php';?>