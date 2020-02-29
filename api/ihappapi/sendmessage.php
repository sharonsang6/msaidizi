<?php


	if (isset($_POST['mailsend'])) {
        $name = trim(strip_tags($_POST['name']));
        $email = trim(strip_tags($_POST['email']));
        $subject = trim(strip_tags($_POST['subject']));
        $message = trim(strip_tags($_POST['message']));
     


         
                try
		{
		if($user->sendmessage($name, $email, $subject, $message)){  
		    $alert = "message sent";
		  }
		}
		catch(PDOException $e)
		{
		$alert = $e->getMessage();
		}
	} 


		


	
?>