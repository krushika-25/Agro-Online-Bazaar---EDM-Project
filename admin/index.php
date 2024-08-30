<?php
    include "header1.php";
?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-user icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(l_id) FROM tbl_login WHERE l_status='1' AND l_role='1'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Total Admin</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-user user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(l_id) FROM tbl_login WHERE l_status='1' AND l_role='2'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Total User</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-th user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(cat_id) FROM tbl_cat WHERE cat_status='1'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Total Category</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-product-hunt dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(p_id) FROM tbl_product WHERE p_status='1'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>New Product</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
     <div class="col_3">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-product-hunt icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(p_id) FROM tbl_product WHERE p_status='2'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Approved Product</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-star user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(f_id) FROM tbl_feedback WHERE f_status='1'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Feedback</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>
                          <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(c_id) FROM tbl_contact WHERE c_status='1'"));
                         echo $count1[0];
                        ?>
                      </strong></h5>
                      <span>Contact</span>
                    </div>
                </div>
            </div>
           
            <div class="clearfix" style="margin-bottom: 30%;"> </div>
      </div>
	 
		
		
		</div>

       </div>

      <!-- /#page-wrapper -->
   </div>

    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
