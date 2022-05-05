<?php include("header.php");?>
        <div class="main-container">
                <div class="card-box mb-30">
                    <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Teachers Register Form</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="teacher" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
                                </div>
                            </div>
                    </div>
                    <form action="add_teacher" method="post" enctype="multipart/form-data">
                    <div class="form-group">
							<label>Name</label>
							<input class="form-control" name="name" type="text" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="email" type="email" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="password" type="password" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="phone" type="tel" require>
						</div>
                        <div class="form-group">
							<label>Address</label>
							<input class="form-control" name="address" type="text" required>
						</div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                            <!-- <input class="form-control" type="file" name="faculties"> -->
                            <select class="form-control" name="gender" required>
                                <option value="" >Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <div>
                            <input class="form-control" type="file" name="photo"  required>
                            </div>
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