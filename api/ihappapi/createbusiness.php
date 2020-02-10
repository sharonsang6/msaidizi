<?php
if (isset($_POST['submitbusinessButton'])) {
	$gandertech_businesses_pulic_id = time();
	$gandertech_public_id = strip_tags($_POST['gandertech_public_id']);
	$gandertech_business_name = strip_tags($_POST['gandertech_business_name']);
	$gandertech_business_currency = strip_tags($_POST['gandertech_business_currency']);
	$gandertech_business_country = strip_tags($_POST['gandertech_business_country']);
	$gandertech_business_location = strip_tags($_POST['gandertech_business_location']);

	if($gandertech_public_id == "") { $alert = "provide public id"; }
	elseif($gandertech_business_name == "") { $alert = "provide business name"; }
	elseif($gandertech_business_currency == "") { $alert = "provide trade currency"; }
	elseif($gandertech_business_country == "") { $alert = "provide country"; }
	elseif($gandertech_business_location == "") { $alert = "business location"; }
    else
    {
      try
      {
        if($user->setupbusiness($gandertech_businesses_pulic_id, $gandertech_public_id, $gandertech_business_name, $gandertech_business_currency, $gandertech_business_country, $gandertech_business_location)){  
            $alert = "Business setup";
          }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    } 

}	

?>
