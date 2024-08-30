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
							<li class="active">Feedback</li>
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
				
				<div class="col-lg-12 col-md-8 pl-100 pl-xs-15">
					<!--=======  contact form content  =======-->

					<div class="contact-form-content">
						<h3 class="contact-page-title">Give Us your Feedback</h3>

						<div class="contact-form">
							<form id="contact-form" action="#" method="post">
								<div class="form-group">
									<label>Your Feedback <span class="required">*</span></label>
									<textarea name="feedback" id="feedback" required></textarea>
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

  		$feedback = $_POST['feedback'];
    	$lid= $id;
    	$query = "INSERT INTO `tbl_feedback` (`f_id`, `feedback`, `f_status`, `l_id`) VALUES ('', '$feedback', '1', '$lid')";    
        $result = mysqli_query($con,$query);
            
        if(!$result)
        {
            echo "<script>alert('Not Inserted');</script>";
        }
        else
        {      
            echo "<script> alert('Feedback Submitted'); </script>";
    		echo "<script> location.replace('index.php'); </script>";  
        }
  	}
?>