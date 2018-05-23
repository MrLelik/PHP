<?php require_once 'header.php'; ?>
<?php
use Classes\ConnectDb;
use Classes\Article;
?>
<?php
if (isset($_POST['changeArticle'])) {
	$articleManager->updateArticle($_POST, $_GET['changeUrl']);
	unset($_POST['changeArticle']);
	unset($_GET['changeUrl']);
	header('Location: /admin/changeArticle.php');
	exit();
}
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--<a href="#">Add title</a>-->
                <i class="fa fa-pencil-square-o"></i> Change Article
            </li>
        </ol>

	    <?php $article = $articleManager->getArticleByUrl($_GET['changeUrl']); ?>
        <?php if ($article): ?>
            <form role="form" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control"
                           placeholder="Title" name="title" value="<?= $article->title; ?>">
                </div>
                <div class="form-group">
                    <label>Subtitle</label>
                    <input type="text" class="form-control"
                           placeholder="Subtitle" name="subtitle" value="<?=
                    $article->sub_title; ?>">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" rows="10"
                              placeholder="Content" name="content"><?=
                        $article->content; ?></textarea>
                </div>
                <button type="submit" name="changeArticle" class="btn btn-success">Change</button>
            </form>
        <?php else: ?>
            <p>Article not found</p>
        <?php endif; ?>
    </div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php require_once 'footer.php'; ?>
