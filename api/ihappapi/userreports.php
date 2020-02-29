<?php
if (isset($_POST['filteruser'])) {
  print_r($_POST);
  
  else
    {
      try
      {
        if($user->makeapplicationoffet($services_id, $public_id, $worker_id, $start_date, $duration)){  
            $alert = "Job scheduled";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	
?>
