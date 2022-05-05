<?php
include('../admin/connect.php');

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SkillUp</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../admin/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../admin/vendors/images/icons8-school-64.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login">
					<img src="../admin/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="../admin/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To SkillUp</h2>
						</div>
						<?php
							if(isset($_SESSION['reg_success'])):

						?>
						<div class="alert alert-success" role="alert">
						<h5> Congratulatons</h5>
						<h6> You hvae successfully <span class="">Sign Up </span></h6>
						<hr>
						<p><?= $_SESSION['reg_success']; ?></p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>

						<?php
							endif;
							unset($_SESSION['reg_success']);
						?>
						<?php
							if(isset($_SESSION['fail_login'])):
						?>
						<div class="alert alert-danger" role="alert">


						<p><?= $_SESSION['fail_login']; ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></p>
						</div>
						<?php
							endif;
							unset($_SESSION['fail_login']);
						?>
						<form method="post" action="sigin">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" data-validate = "Valid Username" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
										<button class="btn btn-primary btn-lg btn-block"> 
											Sigin In
										</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../admin/vendors/scripts/core.js"></script>
	<script src="../admin/vendors/scripts/script.min.js"></script>
	<script src="../admin/vendors/scripts/process.js"></script>
	<script src="../admin/vendors/scripts/layout-settings.js"></script>
</body>
</html>