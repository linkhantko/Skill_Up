<?php
include("header.php");

$teacher_name=$_SESSION['loginUser']['name'];
echo $teacher_name;
$sql_class="SELECT * FROM classes WHERE teacher_name=:teacher_name";
$stmt_class=$conn->prepare($sql_class);
$stmt_class->bindParam(':teacher_name',$teacher_name);
$stmt_class->execute();
$class =$stmt_class->fetchAll();
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
                                    <a href="booking_view?cid=<?=$cid?>&level=<?=$assign_level?>" class="btn btn-success">View</a>
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