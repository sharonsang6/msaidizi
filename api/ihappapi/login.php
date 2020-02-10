<?php
if(isset($_POST['loginbutton']))
{
  $user_email = strip_tags($_POST['user_email']);
  $user_password = strip_tags($_POST['user_password']);
    
  if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) { $alert = "enter valid email"; }
  elseif ($user_password =="") { $alert = "Provide password"; }
  else{
    try {
        if($user->doLogin($user_email, $user_password))
        {
          $alert = "Successful login";
          header("Location: ../msaidizi/profile.php");
        }
        else
        {
          $alert = "Error loging in";
        } 
    } catch (Exception $e) {
      $alert = $e->getMessage();
    }
  }
}
?>