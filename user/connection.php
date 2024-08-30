<?php
	
	$con = mysqli_connect('localhost','root','','aob');
	
	if(!$con)
	{
		echo "Server not found...";
	}else{mysqli_select_db($con,'aob');}	

?>