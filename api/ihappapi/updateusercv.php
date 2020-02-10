<?php
if (isset($_POST['updatecv'])) {
	$user_cv = base64_encode($_POST['user_cv']);

        try
        {

			$stmt = $auth_user->runQuery("SELECT * FROM gander_technologies_users_cv WHERE gander_technologies_users_public_id=:gander_technologies_users_public_id ");
			$stmt->execute(array(':gander_technologies_users_public_id'=>$gander_technologies_users_public_id));
			$user_profile_images=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1){
	            if($auth_user->user_cv_update($gander_technologies_users_public_id, $user_cv))
	            {
	            	$alert = "You have updated your CV";
	            }
            }
            else
            {
	            if($auth_user->user_cv_first_post($gander_technologies_users_public_id, $user_cv))
	            {
	            	$alert = "You have submited your CV";
	            }
            }


        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
    	}


}
?>