<?php
  include "header1.php";
 $qry1="SELECT * FROM tbl_login WHERE l_id='$id'";
       $run1=mysqli_query($con,$qry1);
       $result1=mysqli_fetch_array($run1);
?>
        <div id="page-wrapper">
        <div class="graphs">
       <div class="xs">
           <h3>Edit Profile</h3>
             <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
              <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" value="<?php echo $result1['l_name']; ?>" name="name" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control1" id="focusedinput" value="<?php echo $result1['l_email']; ?>" name="email" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Phone Number</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" value="<?php echo $result1['l_phone']; ?>" name="phone" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-8">
                    <textarea rows="3"  class="form-control1" name="add" required=""><?php echo $result1['l_add']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Upload New Image</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control1" id="focusedinput" name="image">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Current Image</label>
                  <div class="col-sm-8">
                   <img src="<?php echo $img; ?>" width="120px" height="120px">
                  </div>
                </div>

              <button type="submit" name="submit" class="btn" style="color:#fff;background-color:#5cb85c;border-color:#4cae4c;margin-left: 40%;">Add</button>
        
              </form>
            </div>
          </div>
          
    

     
    </form>
  </div>
  </div>

  </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
    {

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $add=$_POST['add'];
        $image=$_POST['image'];
        //echo "Hello".$image;
        if($image=="")
        {
            $qry1="UPDATE tbl_login SET l_email='$email', l_name='$name', l_phone='$phone', l_add='$add' WHERE l_id='$id'";
            $run1=mysqli_query($con,$qry1);
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
            $qry1="UPDATE tbl_login SET l_email='$email', l_name='$name', l_phone='$phone', l_add='$add', l_img='$location' WHERE l_id='$id'";
            $run1=mysqli_query($con,$qry1);
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