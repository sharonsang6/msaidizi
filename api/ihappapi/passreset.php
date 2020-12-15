<?php
	if (isset($_POST['btn_reset_password'])) {
		print_r($_POST);
		$user_password = trim($_POST['user_password']);
		$cfuser_password = trim($_POST['cfuser_password']);

		if ($user_password == "" ) {
			$alert = "PASSWORD FIELDS EMPTY";
		}
		elseif($cfuser_password != $user_password ){
			$alert="Password does not match";
		}
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $user_password)) {
    $alert =  "the password does not meet the requirements!";}
		else{
			try
	        {
	        	$new_password = password_hash($user_password, PASSWORD_DEFAULT);
	        	$mine = time();
	            $stmt = $auth_user->runQuery("UPDATE users SET user_password='$new_password'  WHERE public_id= '$public_id' ");
	            $stmt->bindparam(":user_password", $new_password);
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