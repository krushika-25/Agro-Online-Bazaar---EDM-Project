<?php
	session_start();
	include "header1.php";
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
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of breadcrumb area  ======-->

	<div class="page-section section mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<!-- Checkout Form s-->
					<form action="" method="post" class="checkout-form">
						<div class="row row-40">

							<div class="col-lg-7 mb-20">

								<!-- Billing Address -->
								<div id="billing-form" class="mb-40">
									<h4 class="checkout-title">Billing Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input type="text" placeholder="First Name" name="name" id="name" value="<?php echo $uname;?>" required>
										</div>
										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" placeholder="Email Address" name="email" id="email" value="<?php echo $uemail;?>" required>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number" name="phone" id="phone" value="<?php echo $uphone;?>" required>
										</div>
										<div class="col-md-6 col-12 mb-20">
											<label>Pin Code*</label>
											<input type="text" placeholder="Pin Code" name="zip" id="zip" required>
										</div>
										<!-- <div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select" name="country" required>
												<option selected value="India">India</option>
											</select>
										</div> -->

										<div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line" name="add"  id="add" value="<?php echo $uadd;?>" required>
										</div>

										

										<!-- <div class="col-md-4 col-12 mb-20">
											<label>Town/City*</label>
											<input type="text" placeholder="Town/City" required>
										</div>

										<div class="col-md-4 col-12 mb-20">
											<label>State*</label>
											<input type="text" placeholder="State" required>
										</div>

										<div class="col-md-4 col-12 mb-20">
											<label>Zip Code*</label>
											<input type="text" placeholder="Zip Code" required>
										</div> -->
									</div>

								</div>

							</div>

							<div class="col-lg-5">
								<div class="row">

									<!-- Cart Total -->
									<div class="col-12 mb-60">

										<h4 class="checkout-title">Cart Total</h4>

										<div class="checkout-cart-total">

											<h4>Product <span>Total</span></h4>

											<ul>
											<?php 
											 if(isset($_SESSION["shopping_cart"]))
											 {
											 	$total_price = 0;
												foreach ($_SESSION["shopping_cart"] as $product)
												{
													echo '<li>'.$product['name'].' X '.$product['quantity'].' <span>'.$product['quantity']*$product['price'].' </span></li>';
													
													$total_price += ($product["price"]*$product["quantity"]);
												}
											 }
										 	?>
											</ul>

											<p>Sub Total <span>Rs.<?php echo $total_price; ?></span></p>
											<p>Shipping Fee <span>RS.00.00</span></p>

											<h4>Grand Total <span>Rs.<?php echo $total_price; ?></span></h4>

										</div>

									</div>

									<!-- Payment Method -->
									<div class="col-12">

										<h4 class="checkout-title">Payment Method</h4>

										<div id="paypal-button-container"></div>

										<div class="checkout-payment-method">

									

											<div class="single-method">
												<input type="radio" id="payment_cash" name="pay_m" value="cash" required>
												<label for="payment_cash">Cash on Delivery</label>
												<p data-method="cash">Please keep the cash at time of delivery</p>
											</div>
			

										</div>
										
										<button class="place-order" type="submit" name="submitO">Place order</button>
										

									</div>

								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

<?php
  include "footer.php";
  	if(!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart']))
    {
        echo "<script>window.location.href='index.php';</script>";
    }
   	if(isset($_POST['submitO']))
   	{
   		$name= $_POST['name'];
   		$email= $_POST['email'];
   		$phone= $_POST['phone'];
   		$zip= $_POST['zip'];
   		$add= $_POST['add'];
   		$lid= $id;
		$pay = $_POST['pay_m'];
   		$query = "INSERT INTO tbl_order(o_id,l_id,o_name,o_email,o_phone,o_add,o_zip,total_price,o_pay,o_status,created_at,updated_at) VALUES('','$lid','$name','$email','$phone','$add','$zip','$total_price','$pay','confirmed',NOW(),NOW())";
			
		$result = mysqli_query($con,$query);
		$orderid =  mysqli_insert_id($con);
		if(isset($_SESSION['shopping_cart']) || !empty($_SESSION['shopping_cart']))
        {
				foreach($_SESSION['shopping_cart'] as $product)
                        {
                        	$pid = $product['pid'];
                        	$sid = $product['seller'];
                        	$pname = $product['name'];
                        	$price = $product['price'];
                        	$quantity = $product['quantity'];
                        	$total = $quantity*$price;
                        	$query00 = "INSERT INTO tbl_odetails(od_id,o_id,p_id,s_id,s_status,p_name,p_price,p_quantity,total_price) VALUES('','$orderid','$pid','$sid','pending','$pname','$price','$quantity','$total')";
			
							$result00= mysqli_query($con,$query00);
                            
                        }
            unset($_SESSION['shopping_cart']);
            echo "<script>alert('Order Placed')</script>";
            echo "<script>window.location.href= 'view_order.php';</script>";
        }
   	}

?>

<script src="https://www.paypal.com/sdk/js?client-id=ASKlu3ihjxH0wQSLZpXMIrki45RJb76nMzrkPZULNqQoBMS7rcLSzUsQNVGdDJDiII1HN_ZKeYDOKn9y&currency=USD"></script>

<div id="paypal-button-container"></div>

<script>
	var name = $('#name').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	var zip = $('#zip').val();
	var add = $('#add').val(); 

    paypal.Buttons({

     onclick(){
		if(name.length == 0)
	 {
		alert("Name is required")
        return false;
	 }
	 },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total_price ?>' // Total amount to be charged
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Redirect to a success page
                window.location.href = "checkout.php";
            });
        },
        onCancel: function(data) {
            // Redirect to a cancellation page
            window.location.href = "checkout.php";
        },
        onError: function(err) {
            console.error(err);
            alert('An error occurred during the transaction');
        }
    }).render('#paypal-button-container');
</script>
