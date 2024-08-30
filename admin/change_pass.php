<?php
  include "header1.php";
  $qry1="SELECT * FROM tbl_login WHERE l_id='$id'";
       $run1=mysqli_query($con,$qry1);
       $result1=mysqli_fetch_array($run1);
?>
        <div id="page-wrapper">
        <div class="graphs">
       <div class="xs">
           <h3>Change Password</h3>
             <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
              <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Old Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control1" id="focusedinput" placeholder="Enter Old Password" name="pass" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control1" id="focusedinput" placeholder="Enter New Password" name="pass1" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control1" id="focusedinput" placeholder="Confirm New Password" name="pass2" required="">
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
        $pass=$_POST['pass'];   
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        if($l_pass==$pass)
        {
            if($pass1==$pass2)
            {
                $qry1="UPDATE tbl_login SET l_pass='$pass2' WHERE l_id='$id'";
                $run1=mysqli_query($con,$qry1);
                if($run1)
                {
                    echo "<script> alert('Password Changed'); </script>";
                    echo "<script> location.replace('index.php'); </script>";    
                }
            }
            else
            {
                echo "<script> alert('Both the Passwords are Different'); </script>";
                echo "<script> location.replace('change_pass.php'); </script>";
            }
        }
        else
        {
            echo "<script> alert('Incorrect Old Password'); </script>";
            echo "<script> location.replace('change_pass.php'); </script>";
        }

    }
?>