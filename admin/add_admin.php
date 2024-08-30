<?php
	include "header1.php";

?>
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Add Admin</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="insert_admin.php">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Name" name="name" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control1" id="focusedinput" placeholder="Enter Email" name="email" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Phone Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Phone Number" name="phone" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<textarea placeholder="Enter Address" rows="3"  class="form-control1" name="add" required=""></textarea>
									</div>
								</div>
							<button type="submit" name="submit" class="btn" style="color:#fff;background-color:#5cb85c;border-color:#4cae4c;margin-left: 40%;">Add</button>
				
							</form>
						</div>
					</div>
					
		

     
    </form>
  </div>
  </div>

  </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
