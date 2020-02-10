<?php  

if(!$session->is_loggedin())
  {
    // session no set redirects to login page
    $session->redirect('login.php');
  }
?>
