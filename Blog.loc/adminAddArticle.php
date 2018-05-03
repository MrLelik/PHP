<?php require_once 'adminHeader.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid">
<!--        Add Article-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <!--<a href="#">Add title</a>-->
                Add Article
            </li>
        </ol>

        <form role="form">
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
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
</div>
</div>

<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php require_once 'adminFooter.php'; ?>
