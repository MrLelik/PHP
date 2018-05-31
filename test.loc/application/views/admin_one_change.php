<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<!--<a href="#">Add title</a>-->
				<i class="fa fa-pencil-square-o"></i> Change Article
			</li>
		</ol>

		<?php if ($data): ?>
			<form role="form" method="post">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control"
					       placeholder="Title" name="title" value="<?= $data->title; ?>">
				</div>
				<div class="form-group">
					<label>Subtitle</label>
					<input type="text" class="form-control"
					       placeholder="Subtitle" name="subtitle" value="<?= $data->sub_title; ?>">
				</div>
				<div class="form-group">
					<label>Content</label>
					<textarea class="form-control" rows="10"
					          placeholder="Content" name="content"><?= $data->content; ?></textarea>
				</div>
				<button type="submit" name="changeArticle" class="btn btn-success">Change</button>
			</form>
		<?php else: ?>
			<p>Article not found</p>
		<?php endif; ?>
	</div>
</div>