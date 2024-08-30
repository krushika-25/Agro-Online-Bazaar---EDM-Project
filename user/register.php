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
							<li class="active">Register</li>
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
				 	<form action="insert.php" method="POST">

						<div class="login-form">
							<h4 class="login-title">Register</h4>

							<div class="row">
								<div class="col-md-6 col-12 mb-20">
									<label>Name*</label>
									<input class="mb-0" type="text" name="name" placeholder="Name" required>
								</div>
								<div class="col-md-6 col-12 mb-20">
									<label>Phone*</label>
									<input class="mb-0" type="text" name="phone" placeholder="Phone Number" required>
								</div>
								<div class="col-md-6 mb-20">
									<label>Password*</label>
									<input class="mb-0" type="password" name="pass" placeholder="Password" required>
								</div>
								<div class="col-md-6 mb-20">
									<label>Email Address*</label>
									<input class="mb-0" type="email" name="email" placeholder="Email Address" required>
								</div>
								<div class="col-md-6 mb-20">
									<label for="image">Profile Pic*</label>
  									<input type="file" name="image" required>
  								</div>
								<div class="col-md-6 mb-20">
									<label>Address*</label>
									<input class="mb-0" type="text" name="add" placeholder="Address" required>
								</div>
								<div class="col-md-6 mb-20">
									<label>State*</label>
									<input class="mb-0" type="text" name="state" placeholder="state" required>
								</div>
								<div class="col-md-6 mb-20">
									<label>City*</label>
									<input class="mb-0" type="text" name="city" placeholder="city" required>
								</div>
								<div class="col-md-8">
									Have Account ?&nbsp;<a class="mt-0" href="login.php">Login Here</a>
								</div>
								<div class="col-md-4 mt-10 mb-20 text-start text-md-end">
								</div>
								<div class="col-12">
									<button class="register-button mt-0" type="submit" name="submit">Register</button>
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