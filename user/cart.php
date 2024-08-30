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
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of breadcrumb area  ======-->
	<!--  -->
	<div class="page-section section mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
						<!--=======  cart table  =======-->

						<div class="cart-table table-responsive mb-40">
							<table class="table">
								<thead>
									<tr>
										<th class="pro-thumbnail">Image</th>
										<th class="pro-title">Product</th>
										<th class="pro-price">Price</th>
										<th class="pro-quantity">Quantity</th>
										<th class="pro-subtotal">Total</th>
										<th class="pro-remove">Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php	
										if(!empty($_SESSION["shopping_cart"]))	
										{
										 if(isset($_SESSION["shopping_cart"]))
										 {
										 	$total_price = 0;
											foreach ($_SESSION["shopping_cart"] as $product)
											{

												echo '<tr>
												<td class="pro-thumbnail"><a href="#"><img width="350" height="350" src="'.$product['image'].'" class="img-fluid" alt="Product"></a></td>
												<td class="pro-title"><a href="#">'.$product['name'].'</a></td>
												<td class="pro-price"><span>'.$product['price'].'</span></td>
												<td class="pro-quantity">
													<form method="post" action="">
													<div class="pro-qty1">
													
													<input type="hidden" name="pid" value="'.$product['pid'].'" />
													<input type="hidden" name="action" value="change"/>
													<input type="number" name="quantity" min="1" value="'.$product['quantity'].'" onchange="this.form.submit()" required></div>
													</form>
												</td>
												<td class="pro-subtotal"><span>'.$product['price']*$product['quantity'].'</span></td>
												<td class="pro-remove">
												<form method="post" action="">
													<input type="hidden" name="pid" value="'.$product['pid'].'" />
													<input type="hidden" name="action" value="remove" />
													<button type="submit"><i class="fa fa-trash-o"></i></button>
												</form>
												</td>
											</tr>';
											$total_price += ($product["price"]*$product["quantity"]);
											}
										 }
										}
										else
										{
											echo "<tr><td>Cart is empty</td></tr>";
										}

									?>
									
									
								</tbody>
							</table>
						</div>

						<!--=======  End of cart table  =======-->
					<?php
					if(!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items']))
    					{
     
					?>
					<div class="row">
						<div class="col-lg-6 col-12"></div>
						<div class="col-lg-6 col-12 d-flex">
							<!--=======  Cart summery  =======-->
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4>Cart Summary</h4>
									<p>Sub Total <span><?php echo "Rs.".$total_price; ?></span></p>
									<p>Shipping Cost <span>00.00</span></p>
									<h2>Grand Total <span><?php echo "Rs.".$total_price; ?></span></h2>
								</div>
								<div class="cart-summary-button">
									<button class="checkout-btn" onclick="return window.location.href='checkout.php';">Checkout</button>
								</div>
							</div>
							<!--=======  End of Cart summery  =======-->
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--  -->
<?php
    include 'footer.php';
    if (isset($_POST['action']) && $_POST['action']=="remove")
    {
		if(!empty($_SESSION["shopping_cart"])) 
		{
			foreach($_SESSION["shopping_cart"] as $key => $value) 
			{
				if($_POST["pid"] == $key)
				{
					unset($_SESSION["shopping_cart"][$key]);
					echo "<script> alert('Product is removed from your cart!'); </script>";
      				echo "<script>window.location.href='cart.php'; </script>";
				}
				if(empty($_SESSION["shopping_cart"]))
					unset($_SESSION["shopping_cart"]);
			}		
		}
	}

	if (isset($_POST['action']) && $_POST['action']=="change")
	{
  		foreach($_SESSION["shopping_cart"] as &$value)
  		{
    		if($value['pid'] === $_POST["pid"])
    		{
        		$value['quantity'] = $_POST["quantity"];
        		echo "<script>window.location.href='cart.php'; </script>";
        		break; // Stop the loop after we've found the product
    		}
		}
	}
?>