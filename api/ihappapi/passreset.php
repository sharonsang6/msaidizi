<?php
	if (isset($_POST['btn_reset_password'])) {
		$user_password = trim($_POST['user_password']);

		if ($user_password == "" ) {
			$alert = "PASSWORD FIELDS EMPTY";
		}else{
			try
	        {
	        	$user_password = password_hash($user_password, PASSWORD_DEFAULT);
	        	$mine = time();
	            $stmt = $auth_user->runQuery("UPDATE `users` SET `user_password`='$user_password',  WHERE `public_id`= '$public_id' ");
	            $stmt->bindparam(":user_password", $user_password);
	            $stmt->execute();

				$alert = "PASSWORD RESET";
	            return $stmt;
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
			
		}
	}
?>