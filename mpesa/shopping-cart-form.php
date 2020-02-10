<form action="pesapal-iframe.php" method="post">
<input type="text" name="amount" value="350" />
<input type="text" name="type" value="MERCHANT" readonly="readonly" />
<input type="text" name="description" value="Subscription" />
<input type="text" name="reference" value="001" />
<input type="text" name="first_name" value="<?php echo $user->first_name; ?>" />
<input type="text" name="last_name" value="Doe" />
<input type="text" name="email" value="john@yahoo.com" />
<input type="submit" value="Make Payment" />
</form>