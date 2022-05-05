<?php include("header.php");
$sql_teacher="SELECT * FROM users WHERE roles_id= '2'";
$stmt=$conn->prepare($sql_teacher);
$stmt->execute();

$teacher = $stmt->fetchAll();
?>
        <div class="main-container">
                <div class="card-box mb-30">
                            <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Teachers List</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="register_teacher" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-person-add"></i></a>
                                </div>
                            </div>
                            </div>
                            <div class="pb-20">
                        <table class="table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1;
                            foreach($teacher as $teachers){
                            $tid=$teachers['id'];
                            $tname=$teachers['name'];
                            $temail=$teachers['email'];
                            $tgender=$teachers['gender'];
                            $tphone=$teachers['phone'];
                            $taddress=$teachers['address'];
                            ?>
                                <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $tname ?></td>
                                <td><?php echo $temail ?></td>
                                <td><?php echo $tgender ?></td>
                                <td><?php echo $tphone ?></td>
                                <td><?php echo $taddress ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="edit_teacher?id=<?=$tid?>"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" id="sa-warning" href="delete_teacher?id=<?=$tid?>"><i class="dw dw-delete-3"></i> Delete</a>
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