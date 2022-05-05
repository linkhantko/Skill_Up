<?php include("header.php");
error_reporting(E_ERROR | E_PARSE);
$id=$_GET['id'];

$sql_student="SELECT * FROM students WHERE id=:id";
$stmt = $conn->prepare($sql_student);
$stmt ->bindParam(':id', $id);
$stmt ->execute();
$student =$stmt->fetch(PDO::FETCH_ASSOC);

$sql_quiz="SELECT * FROM student_quiz where student_id=:id";
$stmt_quiz = $conn->prepare($sql_quiz);
$stmt_quiz->bindParam(':id',$id);
$stmt_quiz->execute();
$quiz =$stmt_quiz->fetch(PDO::FETCH_ASSOC);

$sql_level="SELECT * FROM levels";
$stmt_level =$conn->prepare($sql_level);
$stmt_level->execute();
$level =$stmt_level->fetchAll();

$sql_assign="SELECT * FROM assign_level where student_id=:id";
$stmt_assign = $conn->prepare($sql_assign);
$stmt_assign->bindParam(':id',$id);
$stmt_assign->execute();
$assign =$stmt_assign->fetch(PDO::FETCH_ASSOC);
?>
        <div class="main-container">
        <div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div style="text-align:center;">
								<img src="<?= $student['photo']  ?>" alt="" class="avatar-photo">
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $student['username'] ?></h5>
							<p class="text-center text-muted font-14"><?= $student['f_name'].'&nbsp'. $student['l_name'] ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $student['email'] ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $student['phone'] ?>
									</li>
									<li>
										<span>Address:</span>
										<?php echo $student['address'] ?>
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 h5 text-blue">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
							<div class="profile-skills">
								<h5 class="mb-20 h5 text-blue">Skills</h5>
								<h6 class="mb-5 font-14">Reading</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5 font-14">Writhing</h6>
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
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Setting Tab start -->
										<div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form action="assign_student" method="post">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Quiz Test result</h4>
																<!-- q1 -->
															<?php if($quiz['ans1'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
																	Shhh!! Please Don't talk so lought; the baby______.
																</div>
															<?php } else if ($quiz['ans1'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
																	Shhh!! Please Don't talk so lought; the baby______.
																</div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q1 end -->
																<!-- q2 -->
															<?php if($quiz['ans2'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
																	______? She wasa at school.
																</div>
															<?php } else if ($quiz['ans2'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
																	______? She wasa at school.
																</div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q2 end -->
																<!-- q3 -->
															<?php if($quiz['ans3'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
																	______ is your house.
																</div>
															<?php } else if ($quiz['ans3'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
																	______ is your house.
																</div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q3 end -->
																<!-- q4 -->
															<?php if($quiz['ans4'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
																	Some birds are stilling ____ the house.
																</div>
															<?php } else if ($quiz['ans4'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
																	Some birds are stilling ____ the house.
																</div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q4 end -->
																<!-- q5 -->
															<?php if($quiz['ans5'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    Please, let me ____!
                                                                </div>
															<?php } else if ($quiz['ans5'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    Please, let me ____!
                                                                </div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q5 end -->
																<!-- q6 -->
															<?php if($quiz['ans6'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    The Kowalskis have always ____ the same docter.
                                                                </div>
															<?php } else if ($quiz['ans6'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    The Kowalskis have always ____ the same docter.
                                                                </div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q6 end -->
																<!-- q7 -->
															<?php if($quiz['ans7'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    Right now, my mother ____ dinner in the kitchen.
                                                                </div>
															<?php } else if ($quiz['ans7'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    Right now, my mother ____ dinner in the kitchen.
                                                                </div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q7 end -->
																<!-- q8 -->
															<?php if($quiz['ans8'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    I've _____ a terrible headache.
                                                                </div>
															<?php } else if ($quiz['ans8'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    I've _____ a terrible headache.
                                                                </div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
															<!-- q8 end -->
															<!-- q9 -->
															<?php if($quiz['ans9'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    I must go home because my husband <br> ____ for me.
                                                                </div>
															<?php } else if ($quiz['ans9'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    I must go home because my husband <br> ____ for me.
                                                                </div>
															<?php } else { ?>
															<div class="alert alert-warning" role="alert">
																Didn't answer yet!
															</div>
															<?php } ?>
																<!-- q9 end -->
																<!-- q10 -->
															<?php if($quiz['ans10'] == "Right") { ?>
																<div class="alert alert-success" role="alert">
                                                                    George Washington ____ the first President of the  United State
                                                                </div>
															<?php } else if ($quiz['ans10'] == "Wrong") { ?>
																<div class="alert alert-danger" role="alert">
                                                                    George Washington ____ the first President of the  United State
                                                                </div>
															<?php } else { ?>
																<div class="alert alert-warning" role="alert">
                                                                    Didn't answer yet!
                                                                </div>
															<?php } ?>
																<!-- q10 end -->
														</li>
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20">Assign Level</h4>
															<div class="form-group">
																<label>Current Level</label>
																<input type="text" value="<?=$id?>" hidden name="studentID">
																<p class="form-control form-control-lg"><?= $assign['level'] ?></p>
															</div>
															<div class="form-group">
																<label>Select level</label>
																<select name="level" class="form-control form-control-lg" required>
																	<option value="">Select here</option>
																	<?php 
																		foreach($level as $levels)
																		{
																			$level_id=$levels['id'];
																			$level=$levels['level'];
																			$description=$levels['description'];
																		?>
																		<option value="<?=$level?>"><?=$level?></option>
																		<?php } ?>
																</select>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Save & Update">
															</div>
														</li>
													</ul>
												</form>
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
<?php include("footer.php");?>