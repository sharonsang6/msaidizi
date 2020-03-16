<?php
    if (isset($_POST['submitamount'])) {
        $public_id = $_POST['public_id'];
        $amount = $_POST['amount'];
        


        if ($amount == "") { $alert = "Provide amount"; }
        else{
            try
            {
                $stmt = $auth_user->runQuery("UPDATE `users` SET `amount`='$amount' WHERE `public_id`='$public_id' ");
                $stmt->bindparam(":amount", $amount); 
                 $stmt->execute();
                $alert = "Job completed, paid and rated";

            }
            catch(PDOException $e)
            {
                $alert =''  $e->getMessage()'';
            }
        }

    }
?>
