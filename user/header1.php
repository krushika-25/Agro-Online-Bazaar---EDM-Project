<?php
    
	include "connection.php";
// session_start();
    
    if(!isset($_SESSION['log']))
    {
        header("location:login.php");
    }
    
    else
    {
        $log = $_SESSION['log'];
        //echo "<script>alert('$log');</script>";
        $qry1="SELECT * FROM tbl_login WHERE l_email='$log'";
        $run1=mysqli_query($con,$qry1);
        $result1=mysqli_fetch_array($run1);
        $img=$result1['l_img'];
        $id = $result1['l_id'];
        $uname= $result1['l_name'];
        $uemail= $result1['l_email'];
        $uphone= $result1['l_phone'];
        $uadd= $result1['l_add'];
        $l_pass = $result1['l_pass'];
        // print_r($result1);
        //echo "<script> alert('$log'); </script>";
    }
?>
 

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from template.hasthemes.com/greenfarm/greenfarm/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Dec 2021 17:21:20 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AOB</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
		
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">

	<!-- CSS
	============================================ -->
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- FontAwesome CSS -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Elegent CSS -->
	<link href="assets/css/elegent.min.css" rel="stylesheet">

	<!-- Plugins CSS -->
	<link href="assets/css/plugins.css" rel="stylesheet">

	<!-- Helper CSS -->
	<link href="assets/css/helper.css" rel="stylesheet">

	<!-- Main CSS -->
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- Modernizer JS -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

	<!--=============================================
	=            Header         =
	=============================================-->

	<header>
		<!--=======  header top  =======-->

		

		<!--=======  End of header top  =======-->

		<!--=======  header bottom  =======-->

		<div class="header-bottom header-bottom-one header-sticky">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12 text-lg-start text-md-center text-sm-center">
						<!-- logo -->
						<div class="logo mt-15 mb-15">
							<a href="index.php">
								<img width="111" height="111" src="assets/images/logo.webp" class="img-fluid" alt="">
							</a>
						</div>
						<!-- end of logo -->
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
							<!-- header phone number
							<div class="header-contact d-flex">
								<div class="phone-icon">
									<img width="40" height="35" src="assets/images/icon-phone.webp" class="img-fluid" alt="">
								</div>
								<div class="phone-number">
									Phone: <span class="number">1-888-123-456-89</span>
								</div>
							</div>
							end of header phone number
							search bar
							<div class="header-advance-search">
								<form action="#">
									<input type="text" placeholder="Search your product">
									<button><span class="icon_search"></span></button>
								</form>
							</div>
							end of search bar -->
							<!-- shopping cart -->
						<!-- 	<div class="shopping-cart" id="shopping-cart">
								<a href="cart.html">
									<div class="cart-icon d-inline-block">
										<span class="icon_bag_alt"></span>
									</div>
									<div class="cart-info d-inline-block">
										<p>Shopping Cart
											<span>
												0 items - $0.00
											</span>
										</p>
									</div>
								</a> -->
								<!-- end of shopping cart -->

								<!-- cart floating box -->
								<!-- <div class="cart-floating-box" id="cart-floating-box">
									<div class="cart-items">
										<div class="cart-float-single-item d-flex">
											<span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
											<div class="cart-float-single-item-image">
												<a href="single-product.html"><img width="350" height="350" src="assets/images/products/product01.webp" class="img-fluid"
														alt=""></a>
											</div>
											<div class="cart-float-single-item-desc">
												<p class="product-title"> <a href="single-product.html">Duis pulvinar obortis eleifend </a></p>
												<p class="price"><span class="count">1x</span> $20.50</p>
											</div>
										</div>
										<div class="cart-float-single-item d-flex">
											<span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
											<div class="cart-float-single-item-image">
												<a href="single-product.html"><img width="350" height="350" src="assets/images/products/product02.webp" class="img-fluid"
														alt=""></a>
											</div>
											<div class="cart-float-single-item-desc">
												<p class="product-title"> <a href="single-product.html">Fusce ultricies dolor vitae</a></p>
												<p class="price"><span class="count">1x</span> $20.50</p>
											</div>
										</div>
									</div>
									<div class="cart-calculation">
										<div class="calculation-details">
											<p class="total">Subtotal <span>$22</span></p>
										</div>
										<div class="floating-cart-btn text-center">
											<a href="checkout.html">Checkout</a>
											<a href="cart.html">View Cart</a>
										</div>
									</div>
								</div> -->
								<!-- end of cart floating box -->
							<!-- </div> -->
						</div>

						<!-- navigation section -->
						
						<div class="main-menu">
							<nav>
								<ul>
									<li class="active "><a href="./">HOME</a>
										
									</li>
									<li class="menu-item-has-children"><a href="#">PRODUCTS</a>
										<ul class="sub-menu">
										<?php 
			                                $qry1="SELECT * FROM tbl_cat";
			                                $run1=mysqli_query($con,$qry1);
			                                // $result1=mysqli_fetch_array($run1)
			                                while ($result1=mysqli_fetch_array($run1)) 
			                                {
			                                    echo '<li><a href="products.php?catid='.$result1['cat_id'].'">'.$result1['cat_name'].'</a></li>';
			                                    
			                                }
			                            ?>
										</ul>
									</li>
									
									
									</li>
									<li><a href="feedback.php">FEEDBACK</a></li>
									<li><a href="view_order.php">View Order</a></li>
									<li class="menu-item-has-children"><a href="#">PROFILE</a>
										<ul class="sub-menu">
											<li><a href="edit_profile.php">Edit Profile</a></li>
									
											<li><a href="change_pass.php">Change Password</a></li>
											<li><a href="./logout.php">Log Out</a></li>
										</ul>
									</li>
									<li>
										<a href="cart.php">
											<span class="icon_bag_alt"></span>&nbsp;CART
											<?php
												if(!empty($_SESSION["shopping_cart"])) 
													{
														$cart_count = count(array_keys($_SESSION["shopping_cart"]));
														echo $cart_count;
													}
											?>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
						<!-- end of navigation section -->
					</div>
					<div class="col-12">
						<!-- Mobile Menu -->
						<div class="mobile-menu d-block d-lg-none"></div>
					</div>
				</div>
			</div>
		</div>

		<!--=======  End of header bottom  =======-->
	</header>

	<!--=====  End of Header  ======-->

