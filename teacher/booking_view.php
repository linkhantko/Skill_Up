<?php include("header.php");
$classid=$_GET['cid'];
$level=$_GET['level'];
$sql_class="SELECT * FROM `booking` WHERE class_id = :classid AND level = :level";
$stmt_class=$conn->prepare($sql_class);
$stmt_class->bindParam(':classid',$classid);
$stmt_class->bindParam(':level',$level);
$stmt_class->execute();
$class =$stmt_class->fetchAll();
?>
        <div class="main-container">
                <div class="card-box mb-30">
                            <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Students List</h4>
                                </div>
                            </div>
                            </div>
                            <div class="pb-20">
                        <table class="table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Userame</th>
                                <th>Class Name</th>
                                <th>Level</th>
                                <th>Attendance</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1;
                            foreach($class as $classes)
                            {
                            $sid=$classes['student_id'];
                            $c_name=$classes['class'];
                            $c_id=$classes['class_id'];
                            $level=$classes['level'];
                            $s_name=$classes['student_name'];
                            $status=$classes['attendance'];
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $s_name ?></td>
                                <td><?php echo $c_name ?></td>
                                <td><?php echo $level ?></td>
                                <td>
                                    <?php if($status == "Absent") { ?>
                                    <a class="btn btn-danger"  href="student_attandance.php?id=<?=$sid?>&status=<?=$status?>&c_id=<?=$c_id?>"   data-toggle="tooltip" data-placement="top"  title="Click to Present">Absent</a>
                                    <?php } else if ($status == "Present") { ?>
                                    <a class="btn btn-success"  href="student_attandance.php?id=<?=$sid?>&status=<?=$status?>&c_id=<?=$c_id?>"  data-toggle="tooltip" data-placement="top"  title="Cancle Present">Present</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            </tbody>
                            <?php } ?>
                    </table>
                </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>