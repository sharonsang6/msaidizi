<?php
if (isset($_POST['make_offer_post'])) {
    $worker_id = $_POST['worker_id'];
    $start_date = $_POST['start_date'];
    $duration = $_POST['duration'];

    if($worker_id == "") { $alert = "Provide worker id"; }
    elseif($start_date == "") { $alert = "Start date required"; }
    elseif($duration == "") { $alert = "Enter duration"; }
    else
    {
      try
      {
        if($user->makeapplicationoffet($public_id, $worker_id, $start_date, $duration)){  
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
