<?php include("header.php");
$sql_student="SELECT * FROM students";
$stmt=$conn->prepare($sql_student);
$stmt->execute();

$student = $stmt->fetchAll();
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
                                <th>Name</th>
                                <th>Userame</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1;
                            foreach($student as $students){
                            $sid=$students['id'];
                            $sf_name=$students['f_name'];
                            $sl_name=$students['l_name'];
                            $susername=$students['username'];
                            $semail=$students['email'];
                            $sgender=$students['gender'];
                            $sphone=$students['phone'];
                            $saddress=$students['address'];
                            $sstatus=$students['status'];
                            ?>
                                <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $sf_name.'&nbsp'.$sl_name ?></td>
                                <td><?php echo $susername ?></td>
                                <td><?php echo $semail ?></td>
                                <td><?php echo $sphone ?></td>
                                <td><?php echo $saddress ?></td>
                                <td>
                                    <?php
                                        if($sstatus == "Active")
                                        {
                                    ?>
                                    <a class="btn btn-outline-success"  href="student_status.php?id=<?=$sid?>&status=<?=$sstatus?>"   data-toggle="tooltip" data-placement="top"  title="Active"><i class="icon-copy fa fa-check" aria-hidden="true"></i></a> |
                                    <?php
                                } else if ($sstatus == "Inactive") {
                                    ?>
                                    <a class="btn btn-outline-danger"  href="student_status.php?id=<?=$sid?>&status=<?=$sstatus?>"  data-toggle="tooltip" data-placement="top"  title="Inactive"><i class="icon-copy fa fa-ban" aria-hidden="true"></i></i></a> |
                                    <?php
                                }
                                    ?>
										<a class="btn btn-outline-info" href="student_delete.php?id=<?=$sid?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="dw dw-delete-3"></i></a>
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