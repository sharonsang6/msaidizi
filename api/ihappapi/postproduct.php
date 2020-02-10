<?php
if (isset($_POST['submitproductButton'])) {
	$gandertech_businesses_pulic_id = strip_tags($_POST['gandertech_businesses_pulic_id']);

	$gandertech_public_id = strip_tags($_POST['gandertech_public_id']);
	$gandertech_business_product_name = strip_tags($_POST['gandertech_business_product_name']);
	$gandertech_business_product_price = strip_tags($_POST['gandertech_business_product_price']);
	$gandertech_business_product_discount = strip_tags($_POST['gandertech_business_product_discount']);
	$gandertech_business_product_display_price = strip_tags($_POST['gandertech_business_product_display_price']);
	$gandertech_product_category = strip_tags($_POST['gandertech_product_category']);
	$gandertech_product_image = strip_tags($_POST['gandertech_product_image']);
	$gandertech_product_details = base64_encode($_POST['gandertech_product_details']);

	if ($gandertech_businesses_pulic_id == "") { $alert = "Provide id"; }
	elseif ($gandertech_public_id == "") { $alert = "provide personal id"; }
	elseif ($gandertech_business_product_name == "") { $alert = "Provide product name"; }
	elseif ($gandertech_business_product_price == "") { $alert = "Provide product price"; }
	elseif ($gandertech_business_product_discount == "") { $alert = "Provide product discount"; }
	elseif ($gandertech_business_product_display_price == "") { $alert = "Provide display price"; }
	elseif ($gandertech_product_category == "") { $alert = "Provide product category"; }
	elseif ($gandertech_product_image == "") { $alert = "Provide image"; }
	elseif ($gandertech_product_details == "") { $alert = "Provide details"; }
    else
    {
      try
      {
        if($user->postproduct($gandertech_businesses_pulic_id, $gandertech_public_id, $gandertech_business_product_name, $gandertech_business_product_price, $gandertech_business_product_discount, $gandertech_business_product_display_price, $gandertech_product_category, $gandertech_product_image, $gandertech_product_details)){  
            $alert = "Product posted";
          }
      }
      catch(PDOException $e)
      {
        $alert = $e->getMessage();
      }
    } 
}	

?>
