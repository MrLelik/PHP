<?php require_once 'adminHeader.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid">
<!--        Add Article-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--<a href="#">Add title</a>-->
                <i class="fa fa-plus-square-o"></i>
                Add Article
            </li>
        </ol>

        <form role="form" method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" name="subtitle">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="10" placeholder="Content" name="content"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="authorAdd" value="<?= $_SESSION['authorID'];?>">
            </div>
            <button type="submit" name="addArticle" class="btn btn-success">Add</button>
        </form>
    </div>
</div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php require_once 'adminFooter.php'; ?>
