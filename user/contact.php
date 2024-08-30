<?php
	include "header.php";
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
							<li class="active">Contact</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of breadcrumb area  ======-->


	<!--=============================================
	=            Contact page content         =
	=============================================-->

	<div class="page-content mb-50">

		<!--=============================================
		=            google map container         =
		=============================================-->

		<!--=====  End of google map container  ======-->

		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 mb-xs-35">
					<!--=======  contact page side content  =======-->

					<div class="contact-page-side-content">
						<h3 class="contact-page-title">Contact Us</h3>

						<!--=======  single contact block  =======-->

						<div class="single-contact-block">
							<h4><img width="34" height="40" src="assets/images/icons/contact-icon1.webp" alt=""> Address</h4>
							<p>Swastik Char Rasta, Ahmedabad</p>
						</div>

						<!--=======  End of single contact block  =======-->

						<!--=======  single contact block  =======-->

						<div class="single-contact-block">
							<h4><img width="36" height="40" src="assets/images/icons/contact-icon2.webp" alt=""> Phone</h4>
							<p>Mobile: 99999 99999</p>
							
						</div>

						<!--=======  End of single contact block  =======-->

						<!--=======  single contact block  =======-->

						<div class="single-contact-block">
							<h4><img width="38" height="42" src="assets/images/icons/contact-icon3.webp" alt=""> Email</h4>
							<p>aob@gmail.com</p>
							
						</div>

						<!--=======  End of single contact block  =======-->
					</div>

					<!--=======  End of contact page side content  =======-->

				</div>
				<div class="col-lg-9 col-md-8 pl-100 pl-xs-15">
					<!--=======  contact form content  =======-->

					<div class="contact-form-content">
						<h3 class="contact-page-title">Tell Us Your Message</h3>

						<div class="contact-form">
							<form id="contact-form" action="#" method="post">
								<div class="form-group">
									<label>Your Name <span class="required">*</span></label>
									<input type="text" name="name" id="name" required>
								</div>
								<div class="form-group">
									<label>Your Email <span class="required">*</span></label>
									<input type="email" name="email" id="email" required>
								</div>
								<div class="form-group">
									<label>Your Phone<span class="required">*</span></label>
									<input type="tel" name="phone" id="phone" required>
								</div>
								<div class="form-group">
									<label>Your Message <span class="required">*</span></label>
									<textarea name="message" id="message" required></textarea>
								</div>
								<div class="form-group">
									<button type="submit" value="submit" id="submit" class="contact-form-btn" name="submit">send</button>
								</div>
							</form>
						</div>
						<p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
					</div>

					<!--=======  End of contact form content =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of Contact page content  ======-->

<?php
  include "footer.php";
  if(isset($_POST['submit']))
    {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
             
        $query = "INSERT INTO tbl_contact(c_id,c_name,c_email,c_phone,c_message,c_status)           VALUES('','$name','$email','$phone','$message',1)";
            
                $result = mysqli_query($con,$query);
                    
                if(!$result)
                {
                    echo "<script>alert('Not Inserted');</script>";
                }
                
                else
                {           
                    echo "<script>alert('Thanks for Contacting');</script>";
                    echo "<script> window.location.href = './';</script>";
                }
    }
?>