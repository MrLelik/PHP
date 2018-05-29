<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
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
			<?php if (false): ?>
				<p style="color: red"><?= UserTools::getErrorMessage(); ?></p>
			<?php endif; ?>
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
					<label class="col-sm-2 control-label">Login</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="login" placeholder="Login">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Password</label>
					<div class="col-sm-12">
						<input type="password" class="form-control" name="pass" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						<button type="submit" name="loginInBlog" class="btn btn-primary">Log In</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-9">
						<a href="/Main/register" class="text-success pull-right">New User Registration</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>