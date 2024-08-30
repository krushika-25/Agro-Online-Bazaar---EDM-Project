<?php

	include "connection.php";
	use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-6.0.5/src/Exception.php';
require 'PHPMailer-6.0.5/src/PHPMailer.php';
require 'PHPMailer-6.0.5/src/SMTP.php';	
	session_start();

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['add'];
		//$pass = $_POST['pass1'];
		function random_strings($length_of_string) 
			{ 
			    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
			  
			    return substr(str_shuffle($str_result),  
			                       0, $length_of_string); 
			} 
		$x=random_strings(6);
			
		
		$file = $_FILES['image']['tmp_name'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			
			if(!$_FILES['image']['name'])
			{
				$location="photos/Default.png";
				
			}

			
		$qry2="SELECT l_email from tbl_login WHERE l_email='$email'";
		
				$result2 = mysqli_query($con,$qry2);

				$c=mysqli_num_rows($result2);
				if($c>=1)
				{
				echo "<script>alert('Same Email Address Exists in Database');</script>";
				header("refresh:0; url=add_admin.php");
				}

				else
				{
			
						$query = "INSERT INTO tbl_login(l_id,l_name,l_email,l_phone,l_pass,l_add,l_img,l_role,l_status) VALUES('','$name','$email','$phone','$x','$address','$location','1','1')";
						
						$result = mysqli_query($con,$query);
							if(!$result)
							{
								echo "<script>alert('Not Inserted');</script>";
							}
							
							else
							{
								
								
							
	//mail


class VerificationCode
{
    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $code;

    public function __construct($receiver)
    {
        /**
         * Your email id  
         * For example : johndoe@gmail.com
         * contact@johndoe.com
         * 
         */
        $this->sender = "sender@gmail.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "senderpwd";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $email=$_POST['email'];
        //echo $email;
        $this->receiver = $email;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="smtp.gmail.com";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;

    }
    public function sendMail(){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->smtpHost;   
        $mail->Port = $this->smtpPort;    
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body=$this->getHTMLMessage();
        $mail->Subject = "Your Password is:- {$this->code}";
        $mail->SetFrom($this->sender,"Password Mail");
        $mail->AddAddress($this->receiver);
        if($mail->send()){
            $email=$_POST['email'];
          header("location:manage_admin.php");
          // return true;
          exit;  
        }
        echo "FAILED TO SEND MAIL";
        // return false;

    }
    public function getVerificationCode()
    {
            $con = mysqli_connect('localhost','root','','aob');
        
             if(!$con)
                {
                     echo "Server not found...";
                 }        
           	else
           	{
            	mysqli_select_db($con,'aob');
        	}	
        	$email=$_POST['email'];
        	$qry3="SELECT * FROM tbl_login WHERE l_email='$email'";
        	$run3=mysqli_query($con,$qry3);
        	$result3=mysqli_fetch_array($run3);
        	return $result3['l_pass'];
    }

    public function getHTMLMessage(){
        $this->code=$this->getVerificationCode();   
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your Password is:- {$this->code}</h1>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

}

// pass your recipient's email
$vc=new VerificationCode('$email'); 
$vc->sendMail();




}
		
					}
?>