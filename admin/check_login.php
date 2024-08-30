<?php

		include "connection.php";
		
		if(isset($_POST['submit']))
		{
			
		session_start();
	
		$log=$_POST['email'];
		
		$pass = $_POST['pass'];
		echo $log;
		
		$qry = "SELECT * FROM tbl_login WHERE (l_email='$log' AND l_pass='$pass')";

		$result = mysqli_query($con,$qry);
		
		$value = mysqli_fetch_array($result);

		
		if($value['l_pass']==$pass)
		{
			
					$_SESSION['log'] = $value['l_email'];
					
					$status = $value['l_status'];
					$role=$value['l_role'];
				
					if($status==1)
					{
						
							if($role=='1')
							{
								header("location:index.php");
							}
							
							
						
							
					}
					else
					{
						echo "<script>  alert('You are not allowed to access this site'); </script>";
						header("Refresh: 0; url=login.php");
					}
						
					
			
			}
			
			else
						{
							echo "<script>  alert('Incorrect Details'); </script>";
						header("Refresh: 0; url=login.php");
						}
	
		
		}
?>