<?php
//var_dump($data);
if ($data) {
	foreach ($data as $dat) { ?>
        <div>
            <a href="/blog/post?<?= $dat->url; ?>">
                <h1><?= $dat->title; ?></h1></a>
            <p><?= $dat->content; ?></p>
        </div>
		<?php
	}
}
?>