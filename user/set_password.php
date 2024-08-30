<?php
	// session_start();
 //    if(!isset($_SESSION['log']))
 //    {
        include 'header.php';
    // }
    // else
    // {
    //   include 'header1.php';
    // }
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
							<li class="active">Set Password</li>
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
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
					<form action="#" method="post">

						<div class="login-form">
							<h4 class="login-title">Set Password</h4>

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>Enter New Password*</label>
									<input type="password" placeholder="Enter New Password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								</div>
								<div class="col-md-12 col-12 mb-20">
									<label>Confirm New Password*</label>
									<input type="password" placeholder="Enter New Password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								</div>
								<div class="col-md-12">
									<button class="register-button mt-0" name="submit" type="submit">Save</button>
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
    
      $lid=$_GET['id'];
	  $pass1=$_POST['pass1'];
	  $pass2=$_POST['pass2'];
	  	if($pass1==$pass2)
		  	{
		    //echo "<script> alert('$pass1'); </script>";
		      $eqry="UPDATE tbl_login SET l_pass='$pass1' WHERE l_id='$lid'";
		          
		      $updated=mysqli_query($con,$eqry);
		    
			    if($updated)
			    {
			      //echo "<script>  alert('$lid'); </script>";
			        echo '<script type="text/javascript">alert("Password Changed");</script>';
			       echo '<script type="text/javascript">window.location.href="login.php";</script>';
			  	}
		  	}	
		else
			{
			echo "<script>  alert('Both the passwords are different'); </script>";
			header("Refresh: 0; url=set_password.php");
			}
	}	
?>