<?php
  include "header1.php";
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>New Order</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table table-hover table-striped">
    
            <tr>
                <th>No</th>
                <th>Name (Quantity)</th>	
                <th>Status</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php
$qry0="SELECT * FROM tbl_order WHERE l_id=$id";
$run0=mysqli_query($con,$qry0);
// $result1=mysqli_fetch_array($run1)
$sr0=1;
while ($result0=mysqli_fetch_array($run0)) 
{
$arr = array('Email',$result0['o_email'],'| Phone',$result0['o_phone'],'| Address',$result0['o_add'],'| Total',$result0['total_price']);
echo '<tr>
        <td colspan="5">OrderNo:'.$sr0.'&nbsp;&nbsp;'.implode(" ",$arr).'</td>
    </tr>';
$oid = $result0['o_id'];
$qry1="SELECT * FROM tbl_odetails WHERE o_id=$oid";
$run1=mysqli_query($con,$qry1);
// $result1=mysqli_fetch_array($run1)
$sr=1;
while ($result1=mysqli_fetch_array($run1)) 
{
  echo	'<tr>	
                                    <td>'.$sr0.'_'.$sr.'</td>
                                    <td>'.$result1['p_name'].'&nbsp;('.$result1['p_quantity'].')</td>
                                    <td>'.$result1['s_status'].'</td>
                                    <td>'.$result1['p_price'].'</td>
                                    <td>'.$result1['total_price'].'</td>
                                </tr>';
                                $sr++;
}
$sr0++;

}
            ?>
            <!-- <tr><td colspan="5">d</td></tr>
            <tr>
                <td>1</td>
                <td>Mostarizing Oil</td>
                <td>Pending</td>
                <td>$45</td>
                <td><a href="cart.html" class="btn">View</a></td>
            </tr> -->
        </tbody>
    </table>
</div>
</div>
</div>									
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
