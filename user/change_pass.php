<?php
	session_start();
    if(!isset($_SESSION['log']))
    {
        include 'header.php';
    }
    else
    {
      include 'header1.php';
    }

?>
<!--=============================================
    =            breadcrumb area         =
    =============================================-->

	<div class="breadcrumb-area mb-50">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">Change Password</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of breadcrumb area  ======-->
	<div class="page-content mb-50">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
				 	<form action="#" method="POST">

						<div class="login-form">
							<h4 class="login-title">Add Product</h4>

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>Old Password*</label>
									<input class="mb-0" type="password" name="pass" placeholder="Old Password" required>
								</div>
								<div class="col-md-6 col-12 mb-20">
									<label>Enter New Password*</label>
									<input type="password" placeholder="Enter New Password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								</div>
								<div class="col-md-6 col-12 mb-20">
									<label>Confirm New Password*</label>
									<input type="password" placeholder="Enter New Password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								</div>
								
								<div class="col-12">
									<button class="register-button mt-0" type="submit" name="submit">Change Password</button>
								</div>
							</div>
						</div>

					</form>
					
				</div>
			</div>
		</div>
	</div>
<?php
    include 'footer.php';
    if(isset($_POST['submit']))
  	{
    
       $pass=$_POST['pass']; 
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        if($l_pass==$pass)
        {
          if($pass1==$pass2)
          {
            $qry1="UPDATE tbl_login SET l_pass='$pass2' WHERE l_id='$id'";
            $run1=mysqli_query($con,$qry1);
            if($run1)
            {
              echo "<script> alert('Password Changed'); </script>";
              echo "<script> location.replace('index.php'); </script>";  
            }
          }
          else
          {
            echo "<script> alert('Both the Passwords are Different'); </script>";
            echo "<script> location.replace('change_pass.php'); </script>";
          }
        }
        else
        {
          echo "<script> alert('Incorrect Old Password'); </script>";
          echo "<script> location.replace('change_pass.php'); </script>";
        }
	}	
        
?>