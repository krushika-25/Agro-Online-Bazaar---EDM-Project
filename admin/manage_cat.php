<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Manage Category</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Sr No</th>
          <th>Category Name</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $seq=1;
                                        $qry1="SELECT * FROM tbl_cat WHERE cat_status='1'";
                                        $run1=mysqli_query($con,$qry1);
                                        while($result1=mysqli_fetch_array($run1))
                                        {
        ?>
        <tr>
          <th scope="row"><?php echo $seq; ?></th>

                                            <td><?php echo $result1['cat_name']; ?></td>
                                            
                                            <td><a href="?del=<?php echo $result1['cat_id'];?>" onclick="return confirm(' Sure to Delete');" class="btn btn-danger btn-circle btn"><i class="fa fa-trash"></i></a></td>          
        </tr>
       <?php
        $seq++;
                                        }
                                         if(isset($_GET['del']))
                                                       {
                                                     // $sql="DELETE FROM tbl_news WHERE news_id=".$_GET['del']."";
                                                      $sql="UPDATE tbl_cat SET cat_status='0' WHERE cat_id=".$_GET['del']."";
                                                      $resultt=mysqli_query($con,$sql);
                                                    if($resultt)
                                                        {
                                                          echo ("<script>location.href='manage_cat.php'</script>");
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
