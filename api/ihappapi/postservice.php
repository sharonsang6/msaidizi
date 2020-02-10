<?php
if (isset($_POST['service_post'])) {
	$typeofworker = strip_tags($_POST['typeofworker']);
	$job = strip_tags($_POST['job']);
	$experiance = strip_tags($_POST['experiance']);
	$town = strip_tags($_POST['town']);
	$description = strip_tags($_POST['description']);
	$cost = strip_tags($_POST['cost']);


	if ($typeofworker == "") { $alert = "Select type of worker"; }
	elseif ($job == "") { $alert = "Enter job title"; }
	elseif ($experiance == "") { $alert = "Select years of experiance"; }
	elseif ($town == "") { $alert = "Select town"; }
	elseif ($description == "") { $alert = "Provide description"; }
	elseif ($cost == "") { $alert = "Provide cost per day"; }
    else
    {
    	try
		{
		if($user->postserviceproduct($public_id, $typeofworker, $job, $experiance, $town, $description, $cost)){  
		    $alert = "service posted";
		  }
		}
		catch(PDOException $e)
		{
		$alert = $e->getMessage();
		}
	} 
}	
?>
