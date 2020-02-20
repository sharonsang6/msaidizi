<?php
if (isset($_POST['Deleteuser'])) {
    $public_id = trim(htmlspecialchars($_POST['public_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `users` WHERE `public_id`= '$public_id' ");
        $stmt->execute();
        $alert = "User deleted";
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
    $public_id = trim(htmlspecialchars($_POST['public_id']));
    try
    {
        $stmt = $auth_user->runQuery("DELETE FROM `offers` WHERE `public_id`= '$public_id' ");
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


