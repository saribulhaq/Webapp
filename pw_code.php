<?php

include_once 'db.php';
if (isset($_POST['save'])) 
{
  $email = $_POST['email'];
  $pas= $_POST['passwo'];
  $pass = md5($pas);
  $sql = "SELECT * FROM registration WHERE email='$email' && password='$pass'";
  $res = mysqli_query($conn, $sql);
 
  if(mysqli_num_rows($res) > 0)
  {

	 
	 $email= $_POST['email'];
	 $pas= $_POST['newpas'];
	$pass = md5($pas);  
	 
mysqli_query($conn,"UPDATE registration set password='$pass' where email='$email'");

require_once 'PHPMailer/PHPMailerAutoload.php'; 
  // creates object
  $mail = new PHPMailer;//(true); 
  
   $eemail      = strip_tags($_POST['email']);
 // $subject = strip_tags('Password Changed');
   $text_message    = "Hello";      
   $p  = strip_tags($_POST['newpas']);
 try
   {
    $mail->IsSMTP(true); 
   // $mail->isHTML(true);
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port        = '587';             
    $mail->AddAddress($eemail);
    $mail->Username   ="ulhaqsarib@gmail.com";  
    $mail->Password   ="sarib123456";            
    $mail->SetFrom('ulhaqsarib@gmail.com','Dont Reply');
    $mail->AddReplyTo("ulhaqsarib@gmail.com","helllo5");
   // $mail->Subject    = "Password Changed";
    $mail->Body    ="Your new password is: " .$p;
    $mail->AltBody    =  $p;
     
    if($mail->Send())
    {
     
     $msg = "Hi, Your mail successfully sent to".$eemail." ";
     
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
   

echo "<p style='color:white;'>password changed successfully and sent mail to your inbox....=>.$eemail</p>";
	
	
}
else
{
	
	echo  "<script>alert('password not changed')</script>";
	
}

}
include'paschange.php';
?>




