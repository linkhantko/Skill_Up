<?php include("header.php");
$sql_point="SELECT * FROM classes";
$stmt=$conn->prepare($sql_point);
$stmt->execute();
$class = $stmt->fetchAll();
?>
        <div class="main-container">
                <div class="card-box mb-30">
                            <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Class List</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="class_register" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus"></i></a>
                                </div>
                            </div>
                            </div>
                            <div class="pb-20">
                        <table class="table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Teacher</th>
                                <th>Course</th>
                                <th>Level</th>
                                <th>Start Date</th>
                                <th>Start time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1;
                            foreach($class as $classes){
                            $cid=$classes['id'];
                            $cname=$classes['class'];
                            $c_course=$classes['course'];
                            $cteacher=$classes['teacher_name'];
                            $clevel=$classes['assign_level'];
                            $cdate=$classes['date'];
                            $ctime=$classes['time'];
                            ?>
                                <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $cname ?></td>
                                <td><?php echo $cteacher ?></td>
                                <td><?php echo $c_course ?></td>
                                <td><?php echo $clevel ?></td>
                                <td><?php echo $cdate ?></td>
                                <td><?php echo $ctime ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="class_delete?cid=<?=$cid?>"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>