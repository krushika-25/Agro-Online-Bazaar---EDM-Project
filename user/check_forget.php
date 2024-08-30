
  <?php

include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-6.0.5/src/Exception.php';
require 'PHPMailer-6.0.5/src/PHPMailer.php';
require 'PHPMailer-6.0.5/src/SMTP.php';

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
        // print_r($mail);
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
        $mail->Subject = "Your OTP is {$this->code}";
        $mail->SetFrom($this->sender,"Verification Mail");
        $mail->AddAddress($this->receiver);
        if($mail->send()){
            $email=$_POST['email'];
            $con = mysqli_connect('localhost','root','','aob');
        
             if(!$con)
                {
                     echo "Server not found...";
                 }        
           else{
            mysqli_select_db($con,'aob');
        }
            $qry1="SELECT * FROM tbl_login WHERE l_email='$email'";
            $run1=mysqli_query($con,$qry1);
            $result1=mysqli_fetch_array($run1);
            $lid=$result1['l_id'];
            //echo $lid;
          header("location:otp.php?id=".$lid);
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
           else{
            mysqli_select_db($con,'aob');
        }

        $email=$_POST['email'];
        $q1="SELECT * FROM tbl_login WHERE l_email='$email'";
        $run=mysqli_query($con,$q1);
        $result=mysqli_fetch_array($run);
        $l_id=$result['l_id'];
        $otp = rand(100000,999999);
        $qry="INSERT into tbl_otp(o_id,otp,o_time,l_id)VALUES('','$otp',NOW(),'$l_id')";
        $run2=mysqli_query($con,$qry);
        return $otp;
    }

    public function getHTMLMessage(){
        $this->code=$this->getVerificationCode();   
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your OTP is {$this->code}</h1>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

}

// pass your recipient's email
$vc=new VerificationCode('$email'); 
$vc->sendMail(); // MAIL SENT SUCCESSFULLY
    ?>