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
				<i class="fa fa-newspaper-o"></i> <?= Model::getCountTable('articles'); ?>
				Articles
			</div>
			<div class="list-group list-group-flush small">
				<?php if ($data): ?>
					<?php foreach ($data as $dat): ?>
						<a class="list-group-item list-group-item-action" href="#">
							<div class="media">
								<div class="media-body">
									<h4><strong><?= $dat->title; ?></strong></h4>
									<p><?= $dat->sub_title; ?></p>
									posted a new article to
									<strong><?= $dat->login; ?></strong>.
									<div class="text-muted smaller"><?= $dat->created_at; ?></div>
								</div>
							</div>
						</a>
						<a class="btn btn-info" href="/admin/changeone?<?= $dat->url; ?>">Change</a>
					<?php endforeach; ?>
				<?php else: ?>
					<p>Articles not found!</p>
				<?php endif; ?>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
</div>