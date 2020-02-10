<?php
if (isset($_POST['rejectapplication'])) {
$user_email = $_POST['user_email'];
$offer_type = "2";
$start_date = $_POST['start_date'];
$status = $_POST['status'];

    if($user_email == "") { $alert = "Provide id"; }
    elseif($offer_type == "") { $alert = "Provide offer"; }
    elseif($start_date == "") { $alert = "Provide appointment date"; }
    elseif($status == "") { $alert = "Provide appointment date"; }
    else
    {
      try
      {
        if($user->rejectjobapplication($user_email, $offer_type, $start_date, $status)){  
            $alert = "Application did not make it through";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	
?>
