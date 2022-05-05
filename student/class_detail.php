<?php include("header.php");
    $id=$_GET['id'];
    $sql_class="SELECT * FROM classes WHERE id=:id";
    $stmt_class=$conn->prepare($sql_class);
    $stmt_class->bindParam(':id',$id);
    $stmt_class->execute();
    $class =$stmt_class->fetch(PDO::FETCH_ASSOC)
    ?>
                <div class="main-container">
                    <div class="pd-ltr-20 xs-pd-20-10">
                        <div class="min-height-200px">
                            <div class="col-md-12 col-sm-12 col-lg-12">
								<div class="blog-detail card-box overflow-hidden mb-30">
									<div class="blog-img">
										<img src="../admin/vendors/images/img4.jpg" alt="">
									</div>
									<div class="blog-caption">
										<h4 class="mb-10 text-blue"><?php echo $class['class'];?></h4>
										<p><?php echo $class['description'];?></p>
                                        <hr>
										<h5 class="mb-10">Class Details</h5>
										<ul>
											<li>Teacher Name - <?php echo $class['teacher_name'];?></li>
											<li>Course - <?php echo $class['course'];?></li>
											<li>Level - <?php echo $class['assign_level'];?></li>
											<li>Date - <?php echo $class['date'];?></li>
											<li>Time - <?php echo $class['time'];?> (1 hour)</li>
											<li>Credit - (1)</li>
										</ul>
                                        <hr>
									</div>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-primary">Book Now</a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="class" class="btn btn-primary">Back</a>
                                    </div>
								</div>
							</div>
                        </div>
					</div>
				</div>
<?php include("footer.php");?>