<?php
    if (isset($_POST['ratework'])) {
        $offers_id = $_POST['offers_id'];
        $worker_id = $_POST['worker_id'];
        $rating = $_POST['rating'];
        $totalpay = $_POST['totalpay'];
        $comment = $_POST['comment'];


        if ($offers_id == "") { $alert = "Provide email number"; }
        elseif ($rating == "") { $alert = "Select start date"; }
        elseif ($totalpay == "") { $alert = "Pay not provided"; }
        elseif ($comment == "") { $alert = "Pay not provided"; }
        else {
            try
            {
                $stmt = $auth_user->runQuery("UPDATE `offers` SET `rating`='$rating', `totalpay`='$totalpay', `comment`='$comment', `status`='1'  WHERE `offers_id`='$offers_id' ");
                $stmt->bindparam(":rating", $rating); 
                $stmt->bindparam(":totalpay", $totalpay); 
                $stmt->bindparam(":comment", $comment); 
                $stmt->bindparam("1", $status); 
                $stmt->execute();
                $alert = "Job completed, paid and rated";

                $stmt = $auth_user->runQuery("UPDATE `profile` SET `allrating`='$rating'  WHERE `public_id`='$worker_id' ");
                $stmt->bindparam(":allrating", $allrating);
                $stmt->execute();
            }
            catch(PDOException $e)
            {
                $alert =  $e->getMessage();
            }
        }

    }
?>


