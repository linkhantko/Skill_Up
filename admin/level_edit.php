<?php
include('header.php');
$id =$_GET['lid'];

$sql="SELECT * FROM levels WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();

$levels =$stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-container">
                <div class="card-box mb-30">
                    <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Level Update Form</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="level" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
                                </div>
                            </div>
                    </div>
                    <form action="level_update" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $levels['id'] ?>" hidden>
                            <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Level</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="level" value="<?= $levels['level'] ?>" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="description" type="text" required cols="30" rows="10"><?= $levels['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-10">
                                <button type="submit" class="btn btn-primary">
                                Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
include('footer.php');
?>