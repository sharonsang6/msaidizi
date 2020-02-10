<?php
	if (isset($_POST['updatepropertydetailbutton'])) {
	$gandertech_property_public_id = strip_tags($_POST['gandertech_property_public_id']);
	$gandertech_property_image = strip_tags($_POST['gandertech_property_image']);
	$gandertech_property_location_on_map = strip_tags($_POST['gandertech_property_location_on_map']);
	$gandertech_property_caretaker_name = strip_tags($_POST['gandertech_property_caretaker_name']);
	$gandertech_property_caretaker_contact = strip_tags($_POST['gandertech_property_caretaker_contact']);
	$gandertech_property_description = base64_encode($_POST['gandertech_property_description']);

        try
        {
        	$stmt = $auth_user->runQuery(" UPDATE `gandertech_property` SET `gandertech_property_image`=:gandertech_property_image, `gandertech_property_location_on_map`=:gandertech_property_location_on_map, `gandertech_property_caretaker_name`=:gandertech_property_caretaker_name, `gandertech_property_caretaker_contact`=:gandertech_property_caretaker_contact, `gandertech_property_description`=:gandertech_property_description WHERE gandertech_property_public_id=$gandertech_property_public_id ");
			$stmt->bindparam(":gandertech_property_image", $gandertech_property_image);
			$stmt->bindparam(":gandertech_property_location_on_map", $gandertech_property_location_on_map);
			$stmt->bindparam(":gandertech_property_caretaker_name", $gandertech_property_caretaker_name);
			$stmt->bindparam(":gandertech_property_caretaker_contact", $gandertech_property_caretaker_contact);
			$stmt->bindparam(":gandertech_property_description", $gandertech_property_description);
			$stmt->execute();
			$alert = "Property updated";
			return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
    	}
	}

?>

