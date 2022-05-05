<?php
include('../admin/connect.php');
session_start();
if(!isset($_SESSION['loginStudent']))
	  {
	    echo "<script>location='login'</script>";
	  }
      $studentID=$_SESSION['loginStudent']['id'];
	  $q_check="No";
      $checked="SELECT q_check FROM students WHERE id =:id AND q_check=:q_check";
      $stmt = $conn-> prepare($checked);
      $stmt ->bindParam(':id', $studentID);
      $stmt ->bindParam(':q_check', $q_check);
      $stmt->execute();
      if($stmt->rowCount() == 0)
      {
        header('location:index');
      }
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../admin/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../admin/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../admin/vendors/images/favicon-16x16.png">

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
				<a href="#">
					<img src="../admin/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Select the correct Answer</h2>
						</div>
                        <hr>
						<form method="post" action="quiz_add">
                            <input type="text" value="<?= $_SESSION['loginStudent']['id'] ?>" hidden name="studentid">
                            <!-- q1 -->
							<div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>1.</strong></span>
                                    <p>Shhh!! Please Don't talk so lought; the baby______.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer1" id="ans11" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans11">A: Sleeps</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer1" id="ans12" required style="margin-right: 11px;" value="Right">
                                <label for="ans12">B: is sleeping</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer1" id="ans13" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans13">C: are sleeping</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer1" id="ans14" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans14">D: Sleeping</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer1" id="ans15" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans15">E: sleeping is</label>
							</div>
                            <!-- q1 end -->
                            <hr>
                            <!-- q2 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>2.</strong></span>
                                    <p>______? She wasa at school.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer2" id="ans21" required style="margin-right: 11px;" value="Right">
                                <label for="ans21">A: Where was Suzanne during the <br> earthquake?</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer2" id="ans22" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans22">B: Was Suzanne yesterday at home?</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer2" id="ans23" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans23">C: Where was the sister of Veronica <br> last Friday?</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer2" id="ans24" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans24">D: Suzanne where was yesterday?</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer2" id="ans25" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans25">E: Where were Suzanne last Monday?</label>
							</div>
                            <!-- q2 end -->
                            <hr>
                            <!-- q3 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>3.</strong></span>
                                    <p>______ is your house.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer3" id="ans31" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans31">A: Whern</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer3" id="ans32" required style="margin-right: 11px;" value="Right">
                                <label for="ans32">B: Which</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer3" id="ans33" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans33">C: What </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer3" id="ans34" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans34">D: Who</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer3" id="ans35" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans35">E: Why</label>
							</div>
                            <!-- q3 end -->
                            <hr>
                            <!-- q4 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>4.</strong></span>
                                    <p>Some birds are stilling ____ the house.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer4" id="ans41" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans41">A: onto</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer4" id="ans42" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans42">B: for</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer4" id="ans43" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans43">C: to </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer4" id="ans44" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans44">D: after</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer4" id="ans45" required style="margin-right: 11px;" value="Right">
                                <label for="ans45">E: on top of</label>
							</div>
                            <!-- q4 end -->
                            <hr>
                            <!-- q5 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>5.</strong></span>
                                    <p>Please, let me ____!</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer5" id="ans51" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans51">A: make</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer5" id="ans52" required style="margin-right: 11px;" value="Right">
                                <label for="ans52">B: think</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer5" id="ans53" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans53">C: want </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer5" id="ans54" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans54">D: put</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer5" id="ans55" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans55">E: have</label>
							</div>
                            <!-- q5 end -->
                            <hr>
                            <!-- q6 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>6.</strong></span>
                                    <p>The Kowalskis have always ____ the same docter.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer6" id="ans61" required style="margin-right: 11px;" value="Right">
                                <label for="ans61">A: gone to</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer6" id="ans62" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans62">B: saw</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer6" id="ans63" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans63">C: going to </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer6" id="ans64" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans64">D: been</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer6" id="ans65" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans65">E: went to</label>
							</div>
                            <!-- q6 end -->
                            <hr>
                            <!-- q7 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>7.</strong></span>
                                    <p>Right now, my mother ____ dinner in the kitchen.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer7" id="ans71" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans71">A: cooks</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer7" id="ans72" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans72">B: does cook</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer7" id="ans73" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans73">C: cooking</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer7" id="ans74" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans74">D: are cooking</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer7" id="ans75" required style="margin-right: 11px;" value="Right">
                                <label for="ans75">E: is cooking</label>
							</div>
                            <!-- q7 end -->
                            <hr>
                            <!-- q8 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>8.</strong></span>
                                    <p>I've _____ a terrible headache.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer8" id="ans81" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans81">A: have</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer8" id="ans82" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans82">B: get</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer8" id="ans83" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans83">C: gottin </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer8" id="ans84" required style="margin-right: 11px;" value="Right">
                                <label for="ans84">D: got</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer8" id="ans85" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans85">E: has</label>
							</div>
                            <!-- q8 end -->
                            <hr>
                            <!-- q9 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>9.</strong></span>
                                    <p>I must go home because my husband <br> ____ for me.</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer9" id="ans91" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans91">A: are waiting</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer9" id="ans92" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans92">B: am waiting</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer9" id="ans93" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans93">C: waiting </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer9" id="ans94" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans94">D: waits</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer9" id="ans95" required style="margin-right: 11px;" value="Right">
                                <label for="ans95">E: is waiting</label>
							</div>
                            <!-- q9 end -->
                            <hr>
                            <!-- q10 -->
                            <div class="input-group custom">
                                <div class="input-group-append">
									<span class="input-group-text"><strong>10.</strong></span>
                                    <p>George Washington ____ the first President of the  United State</p>
								</div>
							</div>
							<div class="input-group custom">
								<input type="radio" name="answer10" id="ans101" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans101">A: were</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer10" id="ans102" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans102">B: will</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer10" id="ans103" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans103">C: where </label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer10" id="ans104" required style="margin-right: 11px;" value="Wrong">
                                <label for="ans104">D: won't</label>
							</div>
                            <div class="input-group custom">
								<input type="radio" name="answer10" id="ans105" required style="margin-right: 11px;" value="Right">
                                <label for="ans105">E: was</label>
							</div>
                            <!-- q10 end -->
                            <hr>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button class="btn btn-primary btn-lg btn-block"> 
											Submit
										</button>
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