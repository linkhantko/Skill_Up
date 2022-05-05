<?php include("header.php");
$sql_teacher="SELECT * FROM users WHERE roles_id='2'";
$stmt_teacher=$conn->prepare($sql_teacher);
$stmt_teacher->execute();
$teacher = $stmt_teacher->fetchAll();

$sql_level="SELECT * FROM levels";
$stmt_level=$conn->prepare($sql_level);
$stmt_level->execute();
$level = $stmt_level->fetchAll();

$sql_course="SELECT * FROM courses";
$stmt_course=$conn->prepare($sql_course);
$stmt_course->execute();
$course = $stmt_course->fetchAll();
?>
        <div class="main-container">
                <div class="card-box mb-30">
                    <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Class Register Form</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="class" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
                                </div>
                            </div>
                    </div>
                    <form action="class_add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
							<label>Class Name</label>
							<input class="form-control" name="classname" type="text" required>
						</div>
                        <div class="form-group">
							<label>Teacher</label>
							<!-- <input class="form-control" name="teacher" type="text" required> -->
                            <select name="teacher" id="" class="form-control" required>
                                <option value="">Select Teacher</option>
                                <?php
                                    foreach($teacher as $teachedrs)
                                    {
                                        $tid=$teachedrs['id'];
                                        $tname=$teachedrs['name'];
                                ?>
                                <option value="<?=$tname?>"><?=$tname?></option>
                                <?php } ?>
                            </select>
						</div>

                        <div class="form-group">
							<label>Course</label>
							<select name="course" id="" class="form-control" required>
                                <option value="">Select Course</option>
                                <?php
                                    foreach($course as $courses)
                                    {
                                        $c_id=$courses['id'];
                                        $c_course=$courses['coursename'];
                                ?>
                                <option value="<?=$c_course?>"><?=$c_course?></option>
                                <?php } ?>
                            </select>
                            </select>
						</div>

                        <div class="form-group">
							<label>Level</label>
							<select name="level" id="" class="form-control" required>
                                <option value="">Select Level</option>
                                <?php
                                    foreach($level as $levels)
                                    {
                                        $lid=$levels['id'];
                                        $llevel=$levels['level'];
                                ?>
                                <option value="<?=$llevel?>"><?=$llevel?></option>
                                <?php } ?>
                            </select>
                            </select>
						</div>
                        <div class="form-group">
                            <label>Class Date</label>
                            <input class="form-control" name="date" placeholder="Select Date" type="date">
                        </div>
                        <div class="form-group">
								<label>Start Time</label>
								<input class="form-control" name="time" placeholder="time" type="time">
							</div>
						<div class="form-group">
							<label>Description</label>
                            <textarea class="form-control" name="description" type="email" required cols="30" rows="10"></textarea>
						</div>
                        <div class="form-group">
                            <div>
                            <button type="submit" name="btnRegister" class="btn btn-primary">
                                Register
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>