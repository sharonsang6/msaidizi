<?php require_once 'header/header.php'; ?>

<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<?php
if(isset($_POST["submit"]) && (!empty($_POST["user_email"]))){
$user_email = $_POST["user_email"];

   $sel_query = "SELECT * FROM `users`";
   $results = mysqli_query($con,$sel_query);
   $row = mysqli_num_rows($results);
     if ($row==""){

      echo $row;
   $error .= "<p>No user is registered with this email address!</p>";
   }

   if($error!=""){
   echo "<div class='error'>".$error."</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$user_email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`user_email`, `key`, `expDate`)
VALUES ('".$user_email."', '".$key."', '".$expDate."');");
 
$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://www.allphptricks.com/forgot-password/reset-password.php?
key='.$key.'&user_email='.$user_email.'&action=reset" target="_blank">
https://www.allphptricks.com/forgot-password/reset-password.php
?key='.$key.'&user_email='.$user_email.'&action=reset</a></p>'; 
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password user_email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   
$output.='<p>Thanks,</p>';
$output.='<p>AllPHPTricks Team</p>';
$body = $output; 
$subject = "Password Recovery - AllPHPTricks.com";
 
$user_email = $user_email;
$fromserver = "noreply@yourwebsite.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.yourwebsite.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "noreply@yourwebsite.com"; // Enter your email here
$mail->Password = "password"; //Enter your password here
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = "noreply@yourwebsite.com";
$mail->FromName = "AllPHPTricks";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
 }
   }
}else{
?>
<form method="post" action="reset_password.php" name="reset"><br /><br />
<label><strong>Enter Your Email Address:</strong></label><br /><br />
<input type="email" name="user_email" placeholder="username@email.com" />
<br /><br />
<input type="submit" name="submit" value="Reset Password"/>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>