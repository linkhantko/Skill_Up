Today at 3:34 PM
<?php include("header.php");

//student's classes
$sql_class="SELECT classes.id, classes.class, classes.course, classes.teacher_name, classes.assign_level, classes.date, classes.time FROM classes JOIN assign_level ON classes.assign_level = assign_level.level AND assign_level.student_id = :studentid ";
$stmt_class=$conn->prepare($sql_class);
$stmt_class->bindParam(':studentid',$studentID);
$stmt_class->execute();
$class =$stmt_class->fetchAll();

$student_name=$_SESSION['loginStudent']['username'];

?>
    <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
                <div class="row clearfix">
                    <?php
                    foreach($class as $classes)
                    {
                        $cid=$classes['id'];
                        $class=$classes['class'];
                        $course=$classes['course'];
                        $teacher_name=$classes['teacher_name'];
                        $assign_level=$classes['assign_level'];
                        $date=$classes['date'];
                        $time=$classes['time'];
                    ?>
					<div class="col-sm-12 col-md-12 col-lg-4 mb-30">
						<div class="card card-box">
							<img class="card-img-top" src="../admin/vendors/images/img4.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title weight-500 font-30 text-blue"><?=$class?></h5>
								<p class="card-text">Teacher Name - <?=$teacher_name?></p>
								<p class="card-text">Course - <?=$course?></p>
								<p class="card-text">Level - <?=$assign_level?></p>
								<p class="card-text"><small class="text-muted">Start in <b class="text-blue"><?=$date?></b> at <b class="text-blue"><?=$time?></b> (1 hour)</small></p>
                                <p class="card-text">Credit Point : 1</p>
                                <p><small><a href="class_detail?id=<?=$cid?>">More detail..</a></small></p>
                                <?php 
                                
                                    //student's booking
                                    $sql_check="SELECT * FROM booking WHERE student_id = :c_studentID AND class_id = :class_id";
                                    $stmt_check=$conn->prepare($sql_check);
                                    $stmt_check->bindParam(':c_studentID',$studentID);
                                    $stmt_check->bindParam(':class_id',$cid);
                                    $stmt_check->execute();
                                    $all_count=$stmt_check->rowCount();
                        
                                    if ($all_count == 1) {
                                ?>
                                    <a href="#" class="btn btn-danger">Booked</a>
                                <?php } else if ($all_count == 0){ ?>
                                    <a href="booking.php?cid=<?=$cid?>&student_id=<?=$studentID?>&teacher_name=<?=$teacher_name?>&student_name=<?=$student_name?>&level=<?=$assign_level?>&class=<?=$class?>" class="btn btn-primary">Book Now</a>
                                <?php } ?>
							</div>
						</div>
					</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php");?>