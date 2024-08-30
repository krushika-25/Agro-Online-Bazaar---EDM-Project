<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Feedback</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Sr No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Feedback</th>
          <th>Image</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $seq=1; 
                                         $qry="SELECT * FROM tbl_feedback WHERE f_status='1'";
                                        $run=mysqli_query($con,$qry);
                                        while($result=mysqli_fetch_array($run))
                                        {
                                          $l_id=$result['l_id'];
                                          $qry1="SELECT * FROM tbl_login WHERE l_id='$l_id'";
                                        $run1=mysqli_query($con,$qry1);
                                        $result1=mysqli_fetch_array($run1)
        ?>
        <tr>
          <th scope="row"><?php echo $seq; ?></th>
<td><?php echo $result1['l_name']; ?></td>
                                            <td><?php echo $result1['l_email']; ?></td>
                                            <td><?php echo $result1['l_phone']; ?></td>
                                            <td class="p"><?php echo $result1['l_add']; ?></td>
                                            <td class="p"><?php echo $result['feedback']; ?></td>
                                            <td><img src="<?php echo $result1['l_img']; ?>" width="50px" height="50px"></td>
                                           
                                            <td><a href="?del=<?php echo $result['f_id'];?>" onclick="return confirm(' Sure to Delete');" class="btn btn-danger btn-circle btn"><i class="fa fa-trash"></i></a></td>          
        </tr>
       <?php
        $seq++;
                                        }
                                         if(isset($_GET['del']))
                                                       {
                                                     // $sql="DELETE FROM tbl_news WHERE news_id=".$_GET['del']."";
                                                      $sql="UPDATE tbl_feedback SET f_status='0' WHERE f_id=".$_GET['del']."";
                                                      $resultt=mysqli_query($con,$sql);
                                                    if($resultt)
                                                        {
                                                          echo ("<script>location.href='feedback.php'</script>");
                                                        }
                                                    
                                                       }
       ?>
      </tbody>
    </table>
   </div>
   
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
