<?php include("header.php");
$sql_point="SELECT * FROM points";
$stmt=$conn->prepare($sql_point);
$stmt->execute();

$point = $stmt->fetchAll();
?>
        <div class="main-container">
                <div class="card-box mb-30">
                            <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Point List</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="point_register" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus"></i></a>
                                </div>
                            </div>
                            </div>
                            <div class="pb-20">
                        <table class="table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Point Name</th>
                                <th>Point Amount</th>
                                <th>Prize</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1;
                            foreach($point as $points){
                            $pid=$points['id'];
                            $pname=$points['pointname'];
                            $pamount=$points['amount'];
                            $pprize=$points['prize'];
                            ?>
                                <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $pname ?></td>
                                <td><?php echo $pamount ?></td>
                                <td><?php echo $pprize ?> $</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="point_edit?pid=<?=$pid?>"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="point_delete?pid=<?=$pid?>"><i class="dw dw-delete-3"></i> Delete</a>
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