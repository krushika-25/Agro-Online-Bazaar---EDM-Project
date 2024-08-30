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
							<li class="active">Forget Password</li>
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
							<h4 class="login-title">Enter OTP</h4>

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>OTP*</label>
									<input class="mb-0" type="text" name="otp" placeholder="OTP" required>
								</div>
								<div class="col-md-12">
									<button class="register-button mt-0" name="submit" type="submit">Next</button>
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

  $otp_enter=$_POST['otp'];

  $q1="SELECT * FROM tbl_otp ORDER BY o_id DESC LIMIT 1 ";
  $run=mysqli_query($con,$q1);
  $result=mysqli_fetch_array($run);
  $otp=$result['otp'];
  $lid=$result['l_id'];
  //echo "<script>alert('$otp'); </script>";
  if($otp==$otp_enter)
  { 
    echo "<script>location.href='set_password.php?id=$lid'</script>";
    
  }
  else
  {
    echo "<script>alert('Incorrect OTP'); </script>";
     header("location:otp.php?id=".$lid);
    //echo $otp;
  }
}
?>