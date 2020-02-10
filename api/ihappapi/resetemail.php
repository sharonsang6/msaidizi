<?php
	if (isset($_POST['btn-recovery-email'])) {
		$user_email = trim(strip_tags($_POST['txt_umail']));
		$reset_key = trim(md5(time()));
		$reset_url = "https://writemywork.com/recovery/".$reset_key;

		$stmt = $auth_user->runQuery("SELECT * FROM users WHERE `user_email`=:user_email ");
		$stmt->execute(array(':user_email'=>$user_email));
		$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
		{
			try
	        {
	            $stmt = $auth_user->runQuery("UPDATE `users` SET `reset_key`='$reset_key' WHERE `user_email`= '$user_email' ");
	            $stmt->bindparam(":reset_key", $reset_key);
	            $stmt->execute();



		        ini_set('SMTP', 'smtp.mailgun.org');
		        $to = $user_email;
		        $from = 'writemyhomework';
		        $subject = 'Account password reset link';
				$headers = "From : " . $from;
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		        $message ='  ';
		    
		        if(mail($to,$subject,$message,$headers))
		        {
					$notifimage = "app/notificons/success.png";
		            $notifcolor = "green";
		            $notiftitle = "PASSWORD RESET";
		            $notifalert = "Pasword reset link";
		            $notifmessage = "Reset link successfully sent to your email: <a href='javascript::'>".$user_email."</a>";
		            require_once 'app/notif.php';            
		        }



	            return $stmt;
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
		}
		else
		{
			$notifimage = "app/notificons/error.png";
			$notifcolor = "green";
			$notiftitle = "EMAIL VERIFICATION";
			$notifalert = "Pasword reset link";
			$notifmessage = "Sorry the email <a href='javascript::'>".$user_email."</a> entered is not recognized";
			require_once 'app/notif.php';
		}



	}
?>