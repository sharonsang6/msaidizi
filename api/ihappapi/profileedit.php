<?php
	if (isset($_POST['submitprofile'])) {
		echo $public_id;
		$first_name = trim(htmlspecialchars($_POST['first_name']));
		$middle_name = trim(htmlspecialchars($_POST['middle_name']));
        $last_name = trim(htmlspecialchars($_POST['last_name']));
        $national_id = trim(htmlspecialchars($_POST['national_id']));
        $gender = trim(htmlspecialchars($_POST['gender']));
        $tribe = trim(htmlspecialchars($_POST['tribe']));
		$country = trim(htmlspecialchars($_POST['country']));
		$town = trim(htmlspecialchars($_POST['town']));
		$phonenumber = trim(htmlspecialchars($_POST['phonenumber']));
		$profileimage = trim(htmlspecialchars($_POST['profileimage']));

        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['profileimage']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['profileimage']['tmp_name'];
        if (in_array($file_extn, $allowed) === true)
        {
            $file_path = 'uploads/profileimages/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);

            try
            {

                $stmt = $auth_user->runQuery("SELECT public_id FROM profile WHERE public_id=:public_id ");
                $stmt->execute(array(':public_id'=>$public_id));
                $user_profile=$stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() == 1){
                    echo "FOUND";
                    if($auth_user->update_user_profile($public_id, $first_name, $middle_name, $last_name,$national_id,$gender,$tribe, $country, $town, $phonenumber, $file_path))
                    {
                        $alert = "Profile updated";
                    }
                    
                }
                else
                {
                    echo "NOTHING FOUND";
                    if($auth_user->post_user_profile($public_id, $first_name, $middle_name, $last_name,$national_id,$gender,$tribe, $country, $town, $phonenumber, $file_path))
                    {
                        $alert = "Profile created";
                    }
                }


            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }            
        }


		


	}
?>