<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Manage Product</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
    <thead>
									<tr>
										<th class="pro-thumbnail">Image</th>
										<th class="pro-title">Product</th>
										<th class="pro-price">Price</th>
										<th class="pro-description">Description</th>
										<th class="pro-quantity">Category</th>
										<th class="pro-subtotal">Status</th>
										<th class="pro-remove">Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php 

              $qry1="SELECT * FROM tbl_product WHERE l_id=$id AND p_status !=0";
              $run1=mysqli_query($con,$qry1);
              while ($result1=mysqli_fetch_array($run1)) 
                {
                	$status = ($result1["p_status"]==2) ? "Approved" : "Not Approved";
                	$catid = $result1['cat_id'];
                	$qry0="SELECT * FROM tbl_cat WHERE cat_id = $catid";
                    $run0=mysqli_fetch_array(mysqli_query($con,$qry0));
                    echo '<tr>
										<td class="pro-thumbnail"><img width="50" height="50" src="'.$result1['p_img'].'" class="img-fluid" alt="Product"></td>
										<td class="pro-title">'.$result1['p_name'].'</td>
										<td class="pro-price"><span>'.$result1['p_price'].'</span></td>
										<td class="pro-description"><span>'.$result1['description'].'</span></td>
										<td class="pro-title">'.$run0['cat_name'].'</td>
										<td class="pro-title">'.$status.'</td>
										<td class="pro-remove"><a href="?del='.$result1['p_id'].'"><i class="fa fa-trash-o"></i></a></td>
									</tr>';
                }
                if(isset($_GET['del']))
               	{
	              $sql="UPDATE tbl_product SET p_status='0' WHERE p_id=".$_GET['del']."";
	              $resultt=mysqli_query($con,$sql);
	            	if($resultt)
	                {
	                  echo ("<script>location.href='manage_product.php'</script>");
	                }
	            
               	}	
            ?>
									
								</tbody>
							</table>
						</div>

						<!--=======  End of cart table  =======-->



				</div>
			</div>
		</div>
	</div>
    <link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
