<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Manage Order</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
    <thead>
    <tr>
														<th>OrderId</th>
														<th>Name (Quantity)</th>	
														<th>Status</th>
														<th>Price</th>
														<th>Total</th>
													</tr>
												</thead>

												<tbody>
													<?php
                            
						                                $qry1="SELECT * FROM tbl_odetails WHERE s_id=$id";
									                          $run1=mysqli_query($con,$qry1);
									                          //$result1=mysqli_fetch_array($run1)
									                          while ($result1=mysqli_fetch_array($run1)) 
									                          	{
									                          		?>
										                   <tr>	
																			<td><?php echo $result1["od_id"]; ?></td>
																			<td><?php echo $result1["p_name"]; ?>&nbsp;(<?php echo $result1["p_quantity"]; ?>)</td>
																			<td>
																			<form method="post" action="">
																			<input type="hidden" name="odid" value="<?php echo $result1["od_id"]; ?>" />
																			<input type="hidden" name="action" value="change" />
																			<select name="status" onchange="this.form.submit()" required>
																			<option <?php if($result1["s_status"]=="pending") echo "selected";?> value="pending">pending</option>
																			<option <?php if($result1["s_status"]=="approved") echo "selected";?> value="approved">approved</option>
																			<option <?php if($result1["s_status"]=="shipped") echo "selected";?> value="shipped">shipped</option>
																			<option <?php if($result1["s_status"]=="delivered") echo "selected";?> value="delivered">delivered</option>
																			</select>
																			</form>
																			</td>
																			<td><?php echo $result1["p_price"]; ?></td>
																			<td><?php echo $result1["total_price"]; ?></td>
																		</tr>
			                         				<?php	}
													?>
													 
												</tbody>
											</table>
										</div>
									</div>
	</div>									
<?php
  
	if (isset($_POST['action']) && $_POST['action']=="change"  )
	{
  		// UPDATE STATUS
  		$odid = $_POST['odid'];
  		$status = $_POST['status'];
  		$qryn="UPDATE tbl_odetails SET s_status= '$status' WHERE od_id='$odid'";
      	$runn=mysqli_query($con,$qryn);
      	if($runn)
      	{
      		echo "<script> alert('Status Updated'); </script>";
          	echo "<script> location.replace('manage_order.php'); </script>";  
      	}

	}
?>
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
