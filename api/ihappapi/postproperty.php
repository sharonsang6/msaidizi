<?php
if (isset($_POST['submitPropertyButton'])) {
    $gandertech_property_public_id = time();
    $gandertech_public_id = strip_tags($_POST['gandertech_public_id']);
    $gandertech_property_name = strip_tags($_POST['gandertech_property_name']);
    $gandertech_property_type = strip_tags($_POST['gandertech_property_type']);
    $gandertech_property_country = strip_tags($_POST['gandertech_property_country']);
    $gandertech_property_location = strip_tags($_POST['gandertech_property_location']);

    if($gandertech_property_name == "") { $alert = "provide property name"; }
    elseif($gandertech_property_type == "") { $alert = "provide property type"; }
    elseif($gandertech_property_country == "") { $alert = "select country"; }
    elseif($gandertech_property_location == "") { $alert = "select location"; }
    else
    {
      try
      {
        if($user->postproperty($gandertech_property_public_id, $gandertech_public_id, $gandertech_property_name, $gandertech_property_type, $gandertech_property_country, $gandertech_property_location)){  
            $alert = "Property listing posted";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	


?>