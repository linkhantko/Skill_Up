<?php
include('../admin/connect.php');
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
				<a href="register">
					<img src="../admin/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login">Login</a></li>
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
							<h2 class="text-center text-primary">Register To SkillUp</h2>
						</div>
						<form method="post" enctype="multipart/form-data" action="student_add.php">
							<div class="input-group custom">
								<input type="file" class="form-control form-control-lg" name="photo" required>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div>
										<input type="text" name="firstname" placeholder="First Name" class="form-control form-control-lg" required>
									</div>
								</div>
								<div class="col-6">
									<input type="text" name="lasttname" placeholder="Last Name" class="form-control form-control-lg" required>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" required>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
							</div>
							<div class="input-group custom">
								<input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Phone" name="phone" required>
							</div>
							<div class="input-group custom">
								<input type="date" class="form-control form-control-lg" placeholder="Date of Birth" name="dob" required>
							</div>
							<div class="input-group custom">
								<textarea name="address" id="" cols="30" rows="10" class="form-control form-control-lg" placeholder="Address" name="address" required></textarea>
							</div>
							<div class="row pb-30">
								<div class="col-6">
										<label>Gender</label>
								</div>
								<div class="col-6">
									<label for="male">Male</label>
									<input type="radio" name="gender" value="Male" id="male" required>
									<label for="female">Female</label>
									<input type="radio" name="gender" value="Female" id="female" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
									</div>
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