<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>My Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<?php if ($data): ?>
				<?php foreach ($data as $dat): ?>
                    <div class="post-preview">
                        <a href="/main/post?<?= $dat->url; ?>">
                            <h2 class="post-title">
								<?= $dat->title; ?>
                            </h2>
                            <h3 class="post-subtitle">
								<?= $dat->sub_title; ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#"><?= $dat->login; ?></a>
                            on <?= $dat->created_at; ?></p>
                    </div>
                    <hr>
				<?php endforeach; ?>
			<?php else: ?>
                <p>Products not found!!!</p>
			<?php endif; ?>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts
                    &rarr;</a>
            </div>
        </div>
    </div>
</div>