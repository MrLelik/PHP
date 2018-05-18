<?php require_once 'header.php'; ?>
<?php

use Classes\UserTools;
use Classes\User;

//var_dump($_SESSION['error_message']);

if (isset($_SESSION['access']) && $_SESSION['access']) {
    header('Location: /');
    exit();
}

if (isset($_POST['register'])) {
	$userObj = UserTools::validateFormRegister($_POST);
	if ($userObj) {
		$newUser = new User($userObj);
	}
}

?>
    <!-- Page Header -->
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

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <?php if (UserTools::getErrorMessage()): ?>
                    <p style="color: red"><?= UserTools::getErrorMessage(); ?></p>
                <?php endif; ?>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?= @$_POST['name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Last Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="<?= @$_POST['lastName'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="registLogin" placeholder="Login" value="<?= @$_POST['registLogin'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= @$_POST['email'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Repeat Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="repeatPass" placeholder="Repeat Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="hidden" name="role" value="user">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" name="register" class="btn btn-success">Register</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                            <a href="login.php" class="text-success pull-right">Log In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php require_once 'footer.php'; ?>