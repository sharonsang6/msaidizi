<?php
if (isset($_POST['update_image'])) {
    $user_profile_image = @$_POST['user_profile_image'];
    $unlinkimage = $_POST['unlinkimage'];

    if(empty($_FILES['user_profile_image']['name']) === true) { $alert = "Provide image!"; }
    else
    {
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['user_profile_image']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['user_profile_image']['tmp_name'];
        if (in_array($file_extn, $allowed) === true)
        {
            unlink("$unlinkimage");
            $file_path = 'uploads/profileimages/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
        	try
            {
            	$stmt = $auth_user->runQuery(" UPDATE `gander_technologies_users` SET `user_profile_image`=:user_profile_image WHERE gander_technologies_users_public_id=$gander_technologies_users_public_id ");
    			$stmt->bindparam(":user_profile_image", $file_path); 
    			$alert = "Image updated";
                  echo '<script type="text/javascript">window.location = "profile"</script>';
    			$stmt->execute();
    			return $stmt;
            }
            catch(PDOException $e)
            {
                $alert = $e->getMessage();
        	}


        }
    }
}
?>