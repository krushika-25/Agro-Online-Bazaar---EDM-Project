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
					<form action="check_forget.php" method="post">

						<div class="login-form">
							<h4 class="login-title">Forget Password</h4>

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>Email Address*</label>
									<input class="mb-0" type="email" name="email" placeholder="Email Address" required>
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
    
?>