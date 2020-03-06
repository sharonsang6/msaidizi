<?php
if (isset($_GET['pesapal_transaction_tracking_id'])) {
	$pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	$pesapal_merchant_reference = $_GET['pesapal_merchant_reference']; 

    $stmt = $auth_user->runQuery("UPDATE `users` SET `premium`='1', `pesapal_transaction_tracking_id`='$pesapal_transaction_tracking_id', `pesapal_merchant_reference`='$pesapal_merchant_reference' WHERE `public_id`='$public_id' ");
    $stmt->bindparam("1", $premium); 
    $stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id); 
    $stmt->bindparam(":pesapal_merchant_reference", $pesapal_merchant_reference); 
    $stmt->execute();
    $alert = "Premium activated";

    ?>
<head>
<script language="javascript">
function printdiv(printpage) {
var headstr<?php
if (isset($_GET['pesapal_transaction_tracking_id'])) {
	$pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	$pesapal_merchant_reference = $_GET['pesapal_merchant_reference']; 

    $stmt = $auth_user->runQuery("UPDATE `users` SET `premium`='1', `pesapal_transaction_tracking_id`='$pesapal_transaction_tracking_id', `pesapal_merchant_reference`='$pesapal_merchant_reference' WHERE `public_id`='$public_id' ");
    $stmt->bindparam("1", $premium); 
    $stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id); 
    $stmt->bindparam(":pesapal_merchant_reference", $pesapal_merchant_reference); 
    $stmt->execute();
    $alert = "Premium activated";

    ?>
<head>
<script language="javascript">
function printdiv(pri = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr + newstr + footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>
<?php

if ( $userRow['premium'] ==0 && time() > $userRow['public_id']+669585) { ?>
	<div class="btn-group btn-group-lg" role="group" aria-label="Basic example" style="width: 100%;">
		<form action="mpesa/pesapal-iframe.php" method="post"  style="width: 100%;">
		<input hidden type="text" name="amount" value="350" />
		<input hidden type="text" name="type" value="MERCHANT" readonly="readonly" />
		<input hidden type="text" name="description" value="Subscription" />
		<input hidden type="text" name="reference" value="<?php echo $userRow['public_id']; ?>" />
		<input hidden type="text" name="first_name" value="<?php echo $userRow['user_name']; ?>" />
		<input hidden type="text" name="last_name" value="null" />
		<input hidden type="text" name="email" value="<?php echo $userRow['user_email']; ?>" />
	  <button type="submit" class="btn btn-secondary" style="width: inherit;">Make payment to enjoy services</button>
		</form>
	</div>	

<?php die(); } 