<?php
  session_start();
  include 'header1.php';
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
              <li class="active">Edit Profile</li>
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
              <h4 class="login-title">Register</h4>

              <div class="row">
                <div class="col-md-6 col-12 mb-20">
                  <label>Name*</label>
                  <input type="text" name="name" id="name" value="<?php echo $uname; ?>" placeholder="Name" required />
                </div>
                <div class="col-md-6 col-12 mb-20">
                  <label>Phone*</label>
                  <input type="tel" name="phone" id="phone" value="<?php echo $uphone; ?>" pattern="[6789][0-9]{9}" placeholder="Phone"
                                        required />
                </div>
                <div class="col-md-6 mb-20">
                  <label>Email Address*</label>
                  <input type="email" name="email" id="email" value="<?php echo $uemail; ?>" placeholder="Email " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                        required />
                </div>
                <div class="col-md-6 mb-20">
                  <label>Address*</label>
                    <input type="text" name="add" id="add" value="<?php echo $uadd; ?>" placeholder="Address" required />
                </div>
                <div class="col-md-6 mb-20">
                  <img src="<?php echo $img; ?>"> 
                </div>
                <div class="col-md-6 mb-20">
                  <label for="image">Profile Pic*</label>
                    <input type="file" name="image">
                </div>
                <div class="col-md-4 mt-10 mb-20 text-start text-md-end">
                </div>
                <div class="col-12">
                  <button class="register-button mt-0" type="submit" name="submit">Edit profile</button>
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
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $add=$_POST['add'];
        $image=$_POST['image'];
        if($image=="")
        {
          $qury1="UPDATE tbl_login SET l_email='$email', l_name='$name', l_phone='$phone', l_add='$add' WHERE l_id='$id'";
          $run1=mysqli_query($con,$qury1);
          if($run1)
          {
            echo "<script> alert('Profile Updated'); </script>";
            echo "<script> location.replace('index.php'); </script>";  
          }
          else
          {
            echo "<script> alert('Profile Not Updated'); </script>";
            echo "<script> location.replace('edit_profile.php'); </script>";  
          }
        }
        else
        {
          $location="photos/".$image;
          $query1="UPDATE tbl_login SET l_email='$email', l_name='$name', l_phone='$phone', l_add='$add', l_img='$location' WHERE l_id='$id'";
          $run1=mysqli_query($con,$query1);
          if($run1)
          {
            echo "<script> alert('Profile Updated'); </script>";
            echo "<script> location.replace('index.php'); </script>";  
          }
          else
          {
            echo "<script> alert('Profile Not Updated'); </script>";
            echo "<script> location.replace('edit_profile.php'); </script>";  
          } 
        }

    } 
?>