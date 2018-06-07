<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello</title>
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="/css/clean-blog.css" rel="stylesheet">
    <!-- Стиль строки поиска -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/search.css"
          type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
		<?php if (isset($_SESSION['access']) && $_SESSION['access']): ?>
            <a class="navbar-brand" href="/">Hello <?= $_SESSION['login'] ?? ''; ?></a>
		<?php endif; ?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/main/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/main/one">Sample Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/main/contact">Contact</a>
                </li>
				<?php if (isset($_SESSION['access']) && $_SESSION['access'] && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index">Admin Panel</a>
                    </li>
				<?php endif; ?>
				<?php if (!isset($_SESSION['access']) || !$_SESSION['access']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/main/login">Log in</a>
                    </li>
				<?php endif; ?>
				<?php if (isset($_SESSION['access']) && $_SESSION['access']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/main/logout">Exit</a>
                    </li>
				<?php endif; ?>
            </ul>
        </div>
    </div>
    <form action="/main/search" method="post" id="search-block-form">
        <div class="form-item">
            <input type="text" name="words" value="" maxlength="128" placeholder="Найти...">
        </div>
        <div class="form-actions">
<!--            <input type="submit" value="Поиск" class="form-submit" href="/main/search">-->
<!--            <a class="form-submit" href="javaScript:void(0)" submit="clickMe()"></a>-->
        </div>
    </form>
</nav>

	        <?php include 'application/views/' . $content_view; ?>


<hr>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/MrLelik/PHP/tree/master/Blog.loc">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>

<!-- Custom scripts for this template -->
<script src="/js/clean-blog.js"></script>

<!--<script>-->
<!--    function clickMe() {-->
<!--        $.ajax({-->
<!--            // method: "POST",-->
<!--            // url: "/blog/ajax",-->
<!--            // data: { urlImage: urlImage }-->
<!--            console.log('hello');-->
<!--        })-->
<!--            .done(function( msg ) {-->
<!--                console.log( "Data Saved: " + msg );-->
<!--            });-->
<!--    }-->
<!--</script>-->

</body>
</html>
