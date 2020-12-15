<?php
	if (isset($_POST['submitjob'])) {
		$pesapal_transaction_tracking_id = $_POST['pesapal_transaction_tracking_id'];
		$amount = $_POST['amount'];
		$pesapal_merchant_reference = $_POST['pesapal_merchant_reference'];

		try {
			if($user->postStat($pesapal_transaction_tracking_id, $amount, $pesapal_merchant_reference)){  
				$alert = "job posted";
			}
		}
		catch(PDOException $e){
			$alert = $e->getMessage();
		}
	}
?>