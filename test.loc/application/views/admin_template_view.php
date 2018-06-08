<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= Model::viewTitle(); ?></title>
	<!-- Bootstrap core CSS-->
	<link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="/admin/index">MyBlog</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
	        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
	        aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
				<a class="nav-link" href="/admin/index">
					<i class="fa fa-newspaper-o"></i>
					<span class="nav-link-text">Articles</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
				<a class="nav-link" href="/admin/add">
					<i class="fa fa-plus-square-o"></i>
					<span class="nav-link-text">Add Article</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
				<a class="nav-link" href="/admin/change">
					<i class="fa fa-pencil-square-o"></i>
					<span class="nav-link-text">Change Article</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
				<a class="nav-link" href="/admin/delete">
					<i class="fa fa-minus-square-o"></i>
					<span class="nav-link-text">Delete Article</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
				<a class="nav-link" href="/admin/role">
					<i class="fa fa-users"></i>
					<span class="nav-link-text">Change Role Users</span>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav sidenav-toggler">
			<li class="nav-item">
				<a class="nav-link text-center" href="/">
					<i class="fa fa-mail-reply"></i>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link"  href="/">
					<i class="fa fa-mail-reply"></i> Back To MyBlog</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-fw fa-sign-out"></i>Logout</a>
			</li>
		</ul>
	</div>
</nav>

<!-- Articles -->

<?php include 'application/views/' . $content_view; ?>

<!--   footer   -->
<footer class="sticky-footer">
	<div class="container">
		<div class="text-center">
			<small>Copyright © Your Website 2018</small>
		</div>
	</div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="/">Logout</a>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.js"></script>
<!-- Page level plugin JavaScript-->
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/js/sb-admin.js"></script>
<!-- Custom scripts for this page-->
<script src="/js/sb-admin-datatables.js"></script>
</body>

</html>