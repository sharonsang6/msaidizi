<?php
if (isset($_POST['registrationbutton'])) {
    $public_id = time();
    $user_name = strip_tags($_POST['user_name']);
    $user_email = strip_tags($_POST['user_email']);
    $user_password = strip_tags($_POST['user_password']);

    if($user_name == "") {$alert = "Provide user name"; }
    elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) { $alert = "enter valid email"; }
    elseif($user_password == "") {$alert = "Provide user_password"; }
    else
    {
      try
      {
        $stmt = $user->runQuery("SELECT user_email FROM users WHERE user_email=:user_email");
        $stmt->execute(array(':user_email'=>$user_email));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
          
        if($row['user_email']==$user_email) {
          $alert = "sorry email is already in use !";
        }
        else
        {
          if($user->register($public_id, $user_name, $user_email, $user_password)){  
            $alert = 'Registration successful.';
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