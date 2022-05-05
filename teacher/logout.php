<?php
	session_start();
	session_destroy();

	echo "<script>alert('Logout Successful')</script>";
	echo "<script>location='../admin/login'</script>";
 ?>
