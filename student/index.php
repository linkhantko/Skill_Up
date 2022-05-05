<?php
include("header.php");
$studentID=$_SESSION['loginStudent']['id'];
$sql_level="SELECT * FROM assign_level WHERE student_id = :studentid";
$stmt_level=$conn->prepare($sql_level);
$stmt_level->bindParam(':studentid',$studentID);
$stmt_level->execute();
$level =$stmt_level->fetch(PDO::FETCH_ASSOC);

$sql_class="SELECT classes.id, classes.class, classes.course, classes.teacher_name, classes.assign_level, classes.date, classes.time FROM classes JOIN booking ON class_id=classes.id WHERE booking.student_id = :studentid ";
$stmt_class=$conn->prepare($sql_class);
$stmt_class->bindParam(':studentid',$studentID);
$stmt_class->execute();
$class =$stmt_class->fetchAll();

$sql_point="SELECT * FROM students WHERE id = :studentid";
$stmt_point=$conn->prepare($sql_point);
$stmt_point->bindParam(':studentid',$studentID);
$stmt_point->execute();
$point =$stmt_point->fetch(PDO::FETCH_ASSOC);
$tdyDate=date("Y-m-d");

$sql_allcount="SELECT * FROM booking WHERE student_id=:student_id";
$stmt_allcount=$conn->prepare($sql_allcount);
$stmt_allcount->bindParam(':student_id',$studentID);
$stmt_allcount->execute();

$all_count=$stmt_allcount->rowCount();

$sql_attcount="SELECT * FROM booking WHERE student_id=:student_id AND attendance = 'Present'";
$stmt_attcount=$conn->prepare($sql_attcount);
$stmt_attcount->bindParam(':student_id',$studentID);
$stmt_attcount->execute();

$att_count=$stmt_attcount->rowCount();
?>
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="<?= $_SESSION['loginStudent']['photo'] ?>" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?= $_SESSION['loginStudent']['f_name'] ?> <?= $_SESSION['loginStudent']['l_name'] ?></div>
						</h4>
						<p class="font-15 max-width-600"> Your Level is <b class="text-success weight-600 font-20"><?= $level['level'] ?></b></p>
						<p class="font-10 max-width-600">Your Credit Points is <b class="text-danger weight-600 font-20"><?= $point['point'] ?>. </b><a href="profile.php" class="text-info">Click here</a> to add points.</p>
						<p class="font-10 max-width-600">Your Attendance is <b class="text-danger weight-600 font-20">(<?=$att_count?>/<?=$all_count?>) </b></p>
					</div>
				</div>
			</div>
		</div>
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
                                    <a href="booking_delete?cid=<?=$cid?>&student_id=<?=$studentID?>" class="btn btn-danger">Cancel</a>
							</div>
						</div>
					</div>
                    <?php } ?>
                </div>
            </div>
        </div>
	</div>
<?php
include("footer.php");
?>