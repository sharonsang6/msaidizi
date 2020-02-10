<?php
if (isset($_POST['submitPropertyroomButton'])) {
    $gandertech_property_public_id = strip_tags($_POST['gandertech_property_public_id']);
    $gandertech_property_block = strip_tags($_POST['gandertech_property_block']);
    $gandertech_property_block_type = strip_tags($_POST['gandertech_property_block_type']);
    $gandertech_property_rent_price = strip_tags($_POST['gandertech_property_rent_price']);
    $gandertech_property_block_security_deposit = strip_tags($_POST['gandertech_property_block_security_deposit']);
    $gandertech_property_block_contractual_period = strip_tags($_POST['gandertech_property_block_contractual_period']);
    $gandertech_property_block_beds = strip_tags($_POST['gandertech_property_block_beds']);
    $gandertech_property_block_baths = strip_tags($_POST['gandertech_property_block_baths']);
    $gandertech_property_block_terms = strip_tags($_POST['gandertech_property_block_terms']);
    $gandertech_property_block_description = base64_encode($_POST['gandertech_property_block_description']);
    $gandertech_property_block_image = strip_tags($_POST['gandertech_property_block_image']);

    if($gandertech_property_public_id == "") { $alert = "Provide id"; }
    elseif($gandertech_property_block == "") { $alert = "Provide block name or room numeber"; }
    elseif($gandertech_property_block_type == "") { $alert = "Select type"; }
    elseif($gandertech_property_rent_price == "") { $alert = "Enter price"; }
    elseif($gandertech_property_block_security_deposit == "") { $alert = "Enter security deposit"; }
    elseif($gandertech_property_block_contractual_period == "") { $alert = "Select contract period"; }
    elseif($gandertech_property_block_beds == "") { $alert = "Enter number of beds"; }
    elseif($gandertech_property_block_baths == "") { $alert = "Number of baths"; }
    elseif($gandertech_property_block_terms == "") { $alert = "Terms"; }
    elseif($gandertech_property_block_description == "") { $alert = "Description"; }
    elseif($gandertech_property_block_image == "") { $alert = "Provide image"; }
    else
    {
      try
      {
        if($user->postpropertyrooms($gandertech_property_public_id, $gandertech_property_block, $gandertech_property_block_type, $gandertech_property_rent_price, $gandertech_property_block_security_deposit, $gandertech_property_block_contractual_period, $gandertech_property_block_beds, $gandertech_property_block_baths, $gandertech_property_block_terms, $gandertech_property_block_description, $gandertech_property_block_image)){  
            $alert = "Posted successfully";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	
?>