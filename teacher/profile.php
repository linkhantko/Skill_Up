<?php
include('header.php');
$id=$_SESSION['loginUser']['id'];
$sql_user="SELECT * FROM users WHERE id=:id";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bindParam(':id',$id);
$stmt_user->execute();
$users =$stmt_user->fetch(PDO::FETCH_ASSOC);
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<img src="../admin/<?php echo $users['photo'] ?>" alt="" class="avatar-photo">
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $users['name'] ?></h5>
							<p class="text-center text-muted font-14">Role - <?php echo $users['role_name'] ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $users['email'] ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $users['phone'] ?>
									</li>
									<li>
										<span>Address:</span>
										<?php echo $users['address'] ?>
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
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Setting Tab start -->
										<div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form action="profile_update" method="post">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
															<input type="text" name="id" value="<?=$id?>" hidden>
															<div class="form-group">
																<label>Name</label>
																<input class="form-control form-control-lg" type="text" value="<?php echo $users['name'] ?>" name="name" required>
															</div>
															<div class="form-group">
																<label>Phone</label>
																<input class="form-control form-control-lg" type="text" value="<?php echo $users['phone'] ?>" name="phone" required>
															</div>
															<div class="form-group">
																<label>Address</label>
																<textarea name="address" class="form-control form-control-lg" type="text" cols="30" rows="10" required><?php echo $users['address'] ?></textarea>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Information">
															</div>
                                                        </form>
														</li>
														<li class="weight-500 col-md-6">
														<?php
															if(isset($_SESSION['loginUser']))
															{
															$sql_cid="SELECT password from users WHERE id=:id";
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

																$sql= "UPDATE users SET password=:password where id=:id";
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
                                                        <form action="#" method="post">
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