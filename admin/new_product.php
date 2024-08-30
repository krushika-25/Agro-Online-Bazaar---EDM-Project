<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>New Product</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Sr No </th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Approve</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $seq=1;
                                        $qry1="SELECT * FROM tbl_product WHERE p_status='1'";
                                        $run1=mysqli_query($con,$qry1);
                                        while($result1=mysqli_fetch_array($run1))
                                        {
                                          $cat_id=$result1['cat_id'];
                                          $qry2="SELECT * FROM tbl_cat WHERE cat_id='$cat_id'";
                                          $run2=mysqli_query($con,$qry2);
                                          $result2=mysqli_fetch_array($run2);

        ?>
        <tr>
          <th scope="row"><?php echo $seq; ?></th>
                                            <td><?php echo $result1['p_name']; ?></td>
                                            <td><?php echo $result2['cat_name']; ?></td>
                                            <td><?php echo $result1['description']; ?></td>
                                            <td><?php echo $result1['p_price']; ?></td>
                                            <td><img src="<?php echo $result1['p_img']; ?>" height="50px" width="50px"></td>
                                           
                                           
                                            <td><a href="?del=<?php echo $result1['p_id'];?>" onclick="return confirm(' Sure to Approve?');" class="btn btn-circle btn" style="color:#fff;background-color:#5cb85c;border-color:#4cae4c;"><i class="fa fa-check"></i></a></td>          
        </tr>
       <?php
        $seq++;
                                        }
                                         if(isset($_GET['del']))
                                                       {
                                                     // $sql="DELETE FROM tbl_news WHERE news_id=".$_GET['del']."";
                                                      $sql="UPDATE tbl_product SET p_status='2' WHERE p_id=".$_GET['del']."";
                                                      $resultt=mysqli_query($con,$sql);
                                                    if($resultt)
                                                        {
                                                          echo ("<script>location.href='approved_product.php'</script>");
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
