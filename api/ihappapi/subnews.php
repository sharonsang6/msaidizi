<?php
if (isset($_POST['subscribetonewsletter'])) {
  
    $public_id = time();
    $email = strip_tags($_POST['email']);
   
   
   
    {
        try
		{
		if($user->sendemail($public_id, $email)){  
		    $alert = "Email sent";
		  }
		}
		catch(PDOException $e)
		{
		$alert = $e->getMessage();
		}
	} 


		
}	


?>