<?php include("header.php");?>
        <div class="main-container">
                <div class="card-box mb-30">
                    <div class="pd-20">
                    <div class="pd-20 card-box mb-30">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Course Register Form</h4>
                                </div>
                                <div class="pull-right">
                                    <a href="course" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
                                </div>
                            </div>
                    </div>
                    <form action="course_add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
							<label>Course Name</label>
							<input class="form-control" name="coursename" type="text" required>
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