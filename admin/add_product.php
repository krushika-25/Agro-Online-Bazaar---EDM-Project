<html>
    <body>
<?php
	include "header1.php";

?>
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Add Product</h3>
             <div class="page-content mb-50">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
				 	<form action="#" method="POST">

                     

						<div class="row">
								<div class="col-md-6 col-12 mb-20">
									<label>Name*</label>
									<input class="mb-0" type="text" name="name" placeholder="Product Name" required>
								</div><br>
								<div class="col-md-6 col-12 mb-20">
									<label>Description*</label>
									<input class="mb-0" type="text" name="description" placeholder="description" required>
								</div><br>
								<div class="col-md-6 mb-20">
									<label>Product Category*</label>
									<select class="mb-0" required name="pcat">
										<option value="" selected disabled>Select Product Category</option>
										<?php 
			                                $qry1="SELECT * FROM tbl_cat";
			                                $run1=mysqli_query($con,$qry1);
			                                // $result1=mysqli_fetch_array($run1)
			                                while ($result1=mysqli_fetch_array($run1)) 
			                                {
			                                    echo '<option value="'.$result1['cat_id'].'">'.$result1['cat_name'].'</option>';
			                                    
			                                }
			                            ?>
									</select>
								</div><br>
								<div class="col-md-6 mb-20">
									<label>Product Price*</label>
									<input class="mb-0" type="number" name="price" placeholder="Product Price" required>
								</div><br>
								<div class="col-md-6 mb-20">
									<label for="image">Product Image*</label>
  									<input type="file" name="image" required>
  								</div><br>
								
								<div class="col-12">
									<button class="register-button mt-0" type="submit" name="submit">Add Product</button>
								</div>
							</div>
						</div>

					</form>
					
				</div>
			</div>
		</div>
	</div>
    <?php
       
        if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$description = $_POST['description'];
			$pcat = $_POST['pcat'];
			$price = $_POST['price'];
			$lid = $id;
			$img = $_POST['image'];
			$image=basename($img);
			if($image)
			{
				$location="photos/".$image;
				$query = "INSERT INTO tbl_product(p_id,p_name,description,p_img,p_status,l_id,cat_id,p_price) VALUES('','$name','$description','$location','1','$lid','$pcat','$price')";
			
				$result = mysqli_query($con,$query);
					
				if(!$result)
				{
					echo "<script>alert('Not Inserted');</script>";
				}
				
				else
				{			
					echo "<script>alert('Product Added');</script>";
				
				}
				
			}
			else
			{
				echo "Select Image";
				header("refresh:0; url=add_product.php");
				// $location="photos/Default.png";
				// //echo $location;
				// $query = "INSERT INTO tbl_login(l_id,l_name,l_email,l_phone,l_pass,l_add,l_img,l_status,l_role) VALUES('','$name','$email','$phone','$pass','$add','$location','1','2')";
			
				// $result = mysqli_query($con,$query);
				// if(!$result)
				// {
				// 	echo "<script>alert('Not Inserted');</script>";
				// }
				// else
				// {
				// 	header("refresh:0; url=manage_product.php");	
				// }
			}
	
}	
    
?>
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>