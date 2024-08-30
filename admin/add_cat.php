<?php
	include "header1.php";

?>
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Add Category</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" placeholder="Enter Category Name" name="name" required="">
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
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];

	$qry1="INSERT INTO tbl_cat(cat_id,cat_name,cat_status)VALUES('','$name','1')";
	$run1=mysqli_query($con,$qry1);
	if($run1)
	{
		echo ("<script>location.href='manage_cat.php'</script>");
	}
}
?>