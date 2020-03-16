<?php
if (isset($_POST['archiveuser'])) {
    $user_id = trim(htmlspecialchars($_POST['user_id']));
    try
    {
        $stmt = $auth_user->runQuery("UPDATE users set `userStatus`=0  WHERE `user_id`= '$user_id' ");
        $stmt->execute();
        $alert = "User archived";
               return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
<?php
if (isset($_POST['unarchiveuser'])) {
    $user_id = trim(htmlspecialchars($_POST['user_id']));
    try
    {
        $stmt = $auth_user->runQuery("UPDATE users set `userStatus`=1  WHERE `user_id`= '$user_id' ");
        $stmt->execute();
        $alert = "User unarchived";
          return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
<?php
if (isset($_POST['deletemessage'])) {
    $message_id = trim(htmlspecialchars($_POST['message_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `messages` WHERE `message_id`='$message_id' ");
        $stmt->execute();
        $alert = "Message deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
<?php
if (isset($_POST['terminateoffer'])) {
    $offers_id = trim(htmlspecialchars($_POST['offers_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `offers` WHERE `offers_id`= '$offers_id' ");
        $stmt->execute();
        $alert = "Offer deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
<?php
if (isset($_POST['deletejob'])) {
    $job_id = trim(htmlspecialchars($_POST['job_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `jobs` WHERE `job_id`= '$job_id' ");
        $stmt->execute();
        $alert = "Job deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>
<?php
if (isset($_POST['deleteservice'])) {
    $services_id = trim(htmlspecialchars($_POST['services_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `services` WHERE `services_id`= '$services_id' ");
        $stmt->execute();
        $alert = "Service deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>


<?php
if (isset($_POST['deleteproductbutton'])) {
    $gandertech_businesses_products_id = trim(htmlspecialchars($_POST['gandertech_businesses_products_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `gandertech_businesses_products` WHERE `gandertech_businesses_products_id`= '$gandertech_businesses_products_id' ");
        $stmt->execute();
        $alert = "product deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>

<?php
if (isset($_POST['deletepropertyroombutton'])) {
    $gandertech_property_rooms_id = trim(htmlspecialchars($_POST['gandertech_property_rooms_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `gandertech_property_rooms` WHERE `gandertech_property_rooms_id`= '$gandertech_property_rooms_id' ");
        $stmt->execute();
        $alert = "product deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>

<?php
if (isset($_POST['delete_service'])) {
    $gandertech_service_public_id = trim(htmlspecialchars($_POST['gandertech_service_public_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `gandertech_users_services` WHERE `gandertech_service_public_id`= '$gandertech_service_public_id' ");
        $stmt->execute();
        $alert = "service deleted";
        return $stmt;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>


