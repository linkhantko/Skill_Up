<?php
include('header.php');
$id =$_GET['id'];

$sql="SELECT * FROM users WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();

$teachers =$stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-container">
                <div class="card-box mb-30">
                    <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Teachers Update Form</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="teacher" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
                                </div>
                            </div>
                    </div>
                    <form action="update_teacher.php" method="post" enctype="multipart/form-data">

            <input type="text" name="OldPhoto" value="<?= $teachers['photo'] ?>" hidden>
            <input type="text" name="id" value="<?= $teachers['id'] ?>" hidden>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Photo</label>
              <div class="col-sm-12 col-md-10">
                <!-- <input class="form-control" type="text" placeholder="Johnny Brown"> -->
                <div class="pd-20 card-box">
                              <h5 class="h4 text-blue mb-20">Change Photo</h5>
                              <div class="tab">
                                <div class="row clearfix">
                                  <div class="col-md-3 col-sm-12">
                                    <ul class="nav flex-column vtabs nav-tabs customtab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-selected="true">OldPhoto</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-selected="false">NewPhoto</a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-md-9 col-sm-12">
                                    <div class="tab-content">
                                      <div class="tab-pane fade show active" id="home4" role="tabpanel">
                                        <div class="pd-20">
                                          <img src="<?php echo $teachers['photo']; ?>" width="80px" alt="<?php echo $teachers['photo']; ?>" width="200px">
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="profile4" role="tabpanel">
                                        <div class="pd-20">
                                          <input type="file" name="photo" class="form-control-file" id="profile">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Name</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" name="name" value="<?= $teachers['name'] ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" name="gender" type="text" value="<?= $teachers['gender'] ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Email</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?= $teachers['email'] ?>" type="email" name="email" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?= $teachers['phone'] ?>" type="text" name="phone" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Address</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?= $teachers['address'] ?>" type="text" name="address" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 col-md-10">
                <button type="submit" name="btnUpdate" class="btn btn-primary">
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