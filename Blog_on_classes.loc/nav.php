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
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="samplePost.php">Sample Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php if (isset($_SESSION['access']) && $_SESSION['access'] && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/main.php">Admin Panel</a>
                    </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['access']) || !$_SESSION['access']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['access']) && $_SESSION['access']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/?logout">Exit</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <form action="" method="post" id="search-block-form">
        <div class="form-item">
            <input type="text" name="words" value="" maxlength="128" placeholder="Найти...">
        </div>
        <div class="form-actions">
            <input type="submit" name="go" value="Поиск" class="form-submit">
        </div>
    </form>
</nav>
