<?php
include('header.php');
$id=$_SESSION['loginStudent']['id'];
$sql_student="SELECT * FROM students WHERE id=:id";
$stmt_student = $conn->prepare($sql_student);
$stmt_student->bindParam(':id',$id);
$stmt_student->execute();
$students =$stmt_student->fetch(PDO::FETCH_ASSOC);

$sql_point="SELECT * FROM points";
$stmt_point = $conn->prepare($sql_point);
$stmt_point->execute();
$point = $stmt_point->fetchAll();
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<img src="<?php echo $students['photo'] ?>" alt="" class="avatar-photo">
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $students['username'] ?></h5>
							<p class="text-center text-muted font-14"><?php echo $students['f_name'] ?> <?php echo $students['l_name'] ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $students['email'] ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $students['phone'] ?>
									</li>
									<li>
										<span>Address:</span>
										<?php echo $students['address'] ?>
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 h5 text-blue">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
								</ul>
							</div>
							<div class="profile-skills">
								<h5 class="mb-20 h5 text-blue">Key Skills</h5>
								<h6 class="mb-5 font-14">Reading</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Writing</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Listening</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Speaking</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#points" role="tab">Points</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Tasks Tab start -->
										<div class="tab-pane fade show active" id="points" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
                                            <div class="container px-0">
                                                    <div class="row">
                                                        <?php
                                                            foreach($point as $points)
                                                            {
                                                                $pid=$points['id'];
                                                                $pname=$points['pointname'];
                                                                $pamount=$points['amount'];
                                                                $pprice=$points['prize'];

                                                        ?>
                                                        <div class="col-md-4 mb-30">
                                                            <div class="card-box pricing-card mt-30 mb-30">
                                                                <div class="pricing-icon">
                                                                    <img src="../admin/vendors/images/icon-Cash.png" alt="">
                                                                </div>
                                                                <div class="price-title">
                                                                    <?php echo $pname ?>
                                                                </div>
                                                                <div class="pricing-price">
                                                                    <sup>$</sup><?php echo $pprice ?><sub>/yr</sub>
                                                                </div>
                                                                <div class="text">
                                                                    Card servicing<br><?php echo $pamount ?> Points 
                                                                </div>
                                                                <div class="cta">
                                                                    <a href="student_point?point_id=<?=$pid?>&student_id=<?=$id?>" class="btn btn-primary btn-rounded btn-lg">Order Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                </div>
											</div>
										</div>
										<!-- Tasks Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												 <form action="profile_update" method="post">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
															<div class="row">
															<input type="text" name="id" value="<?=$id?>" hidden>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="f_name" class="form-control" value="<?php echo $students['f_name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="l_name" class="form-control" value="<?php echo $students['l_name'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="form-group">
																<label>Phone</label>
																<input class="form-control form-control-lg" type="text" value="<?php echo $students['phone'] ?>" name="phone" required>
															</div>
															<div class="form-group">
																<label>Address</label>
																<textarea name="address" class="form-control form-control-lg" type="text" cols="30" rows="10" required><?php echo $students['address'] ?></textarea>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Information" name="btnUpdate">
															</div>
                                                        </form>
														</li>
														<li class="weight-500 col-md-6">
														<?php
															if(isset($_SESSION['loginStudent']))
															{
															$sql_cid="SELECT password from students WHERE id=:id";
															$stmt_cid=$conn->prepare($sql_cid);
															$stmt_cid ->bindParam(':id', $id);
															$stmt_cid->execute();
															$user=$stmt_cid->fetch(PDO::FETCH_ASSOC);

															$oldpassword=$user['password'];
															}

															if (isset($_POST['btnPassword']))
															{
															$confirmPassword=$_POST['oldPassword'];
															if($oldpassword == $confirmPassword)
															{

																$newPassword=$_POST['newPassword'];

																$sql= "UPDATE students SET password=:password where id=:id";
																$stmt =$conn->prepare($sql);
																$stmt->bindParam(':id',$id);
																$stmt->bindParam(':password',$newPassword);
																$stmt->execute();

																echo "<script>alert('Successfully Update!!!')</script>";

															}else
															{
																echo "<script>alert('Current Password does not match.Try Again')</script>";
															}
															}
														?>
                                                        <form action="" method="post">
															<h4 class="text-blue h5 mb-20">Update Password</h4>
															<div class="form-group">
																<label>Current Password:</label>
																<input class="form-control form-control-lg" type="password" name="oldPassword" required>
															</div>
															<div class="form-group">
																<label>New Password</label>
																<input class="form-control form-control-lg" type="text" name="newPassword" required>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Password" name="btnPassword">
															</div>
                                                        </form>
														</li>
													</ul>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php');