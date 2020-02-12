<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if (userRow['admin'] == 1) {
	echo '<script type="text/javascript">window.location = "users.php"</script>';
}

?>
<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row" style="width: 100% !important;">
<style type="text/css">
	.findworkergroup{
		width: 100%;
	}
</style>
<div class="col-md-3 card">
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM profile WHERE `public_id`=$public_id ");
	$stmt->execute(array(':public_id'=>$public_id));
	$user_profile=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() == 1){ ?>
		<form method="post" enctype="multipart/form-data" >
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" placeholder="first name" type="text" class="form-control" value="<?php echo $user_profile['first_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" placeholder="middle name" type="text" class="form-control" value="<?php echo $user_profile['middle_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" placeholder="last name" type="text" class="form-control" value="<?php echo $user_profile['last_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<input id="inputState" name="country" placeholder="Country" type="text" class="form-control" value="<?php echo $user_profile['country']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<input id="inputState" name="town" placeholder="town" type="text" class="form-control" value="<?php echo $user_profile['town']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number</label>
				<input id="inputState" name="phonenumber" placeholder="Phone number" type="number" class="form-control" value="<?php echo $user_profile['phonenumber']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup">Update profile</button>
		</form>
	<?php }else{ ?>
		<form method="post" enctype="multipart/form-data" >
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" placeholder="first name" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" placeholder="middle name" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" placeholder="last name" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<input id="inputState" name="country" placeholder="Country" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<input id="inputState" name="town" placeholder="town" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number</label>
				<input id="inputState" name="phonenumber" placeholder="Phone number" type="number" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup">Update profile</button>
		</form>
	<?php }
?>

</div>
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
}

?>             
<div class="col-md-6 sunken">
<?php
if ( $userRow['premium'] ==0 && time() > $userRow['public_id']+669600) { ?>
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

<?php }else{ ?>
	<div class="btn-group btn-group-lg" role="group" aria-label="Basic example" style="width: 100%;">
	  <!-- <button type="button" class="btn btn-secondary" style="width: inherit;">Left</button> -->
	  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" style="width: inherit;">Create service</button>
	</div>	
<?php }
?>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?php
		$stmt = $auth_user->runQuery("SELECT idimage FROM profile WHERE `public_id`=$public_id ");
		$stmt->execute(array(':public_id'=>$public_id));
		$user_profile=$stmt->fetch(PDO::FETCH_ASSOC);
		if($user_profile['idimage'] == ""){ ?>
			<center>
	    		<b>Upload national ID to advertise seervice</b>
	    		<form method="post" enctype="multipart/form-data" >
					<div class="form-group findworkergroup">
						<label>First name ( Provided profile name should match with national ID )</label>
						<input id="inputState" name="idimage" placeholder="National ID" type="file" class="form-control" />
					</div>
					<button type="submit" name="update_image" class="btn btn-primary btn-block findworkergroup">Upload ID image</button>
				</form>
	    	</center>
		<?php }else{ ?>
			<center>
	    		<b>Provide service here</b>
	    		<form method="post" enctype="multipart/form-data" >
					<div class="form-group findworkergroup">
						<label>Select type of worker</label>
						<select id="inputState" name="typeofworker" placeholder="Type of worker" type="text" class="form-control" >
							<option value="Indoor">Indoor</option>
							<option value="Outdoor">Outdoor</option>
						</select>
					</div>
					<div class="form-group findworkergroup">
						<label>Enter job title</label>
						<input id="inputState" name="job" placeholder="Job" type="text" class="form-control" />
					</div>
					<div class="form-group findworkergroup">
						<label>Enter job experiance ( years ) </label>
						<input id="inputState" min="0" name="experiance" placeholder="Experiance" type="number" class="form-control" />
					</div>
					<div class="form-group findworkergroup">
						<label>Select town</label>
						<select id="inputState" name="town" placeholder="Town" type="text" class="form-control">
							<?php require_once 'list.php'; ?>
						</select>
					</div>
					<div class="form-group findworkergroup">
						<label>Enter service description </label>
						<textarea rows="3" id="inputState" min="0" name="description" placeholder="Service description" type="text" class="form-control"></textarea>
					</div>
					<div class="form-group findworkergroup">
						<label>Cost per day ( Ksh ) </label>
						<input id="inputState" min="0" name="cost" placeholder="Enter service cost" type="number" class="form-control" />
					</div>
					<button type="submit" name="service_post" class="btn btn-primary btn-block findworkergroup">Post service</button>
				</form>
	    	</center>
		<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<center>My services</center>
    <?php
    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE public_id='$public_id' ");
    $stmt->execute(array());
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($services as $service) { ?>
		<div class="card row" style="margin:10px;">
		  <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
		    	<div class="sunken">
		    		<div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1"><?php echo $service->typeofworker; ?></h5>
				      <small class="text-muted"><?php echo $service->job; ?></small>
				    </div>
		    		Work experiance: <?php echo $service->experiance; ?> year(s)
		    		<?php echo $service->description; ?><br />
		    		<div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1"><?php echo $service->town; ?><br /></h5>
				      <small class="text-muted">Ksh <?php echo $service->cost; ?> per day</small>
				    </div>
		    	</div>
		    </div>
		    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
		  		<a href="work.php?servics=<?php echo $service->services_id; ?>"><button type="button" class="btn btn-primery" style="width: inherit;">View</button></a>
		  	</div>
		</div>    	
    <?php } ?>

</div>

<div class="col-md-3 card">
    <?php
    $stmt = $auth_user->runQuery("SELECT * FROM profile WHERE public_id='$public_id' ");
    $stmt->execute(array());
    $userprofile=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($userprofile as $userprofile) { ?>
    	<center>
    	<h3>
    		<b>
				<img src="<?php echo $userprofile->profileimage; ?>" alt="image" style="width:200px;height: 200px;border-radius: 50%;border: 10px solid #f0f6f9;" /><br /><br />
				<?php echo $userprofile->first_name; ?> <?php echo $userprofile->middle_name; ?> <?php echo $userprofile->last_name; ?><br />
				<?php echo $userprofile->country; ?><br />
				<?php echo $userprofile->town; ?><br />
				<?php echo $userprofile->phonenumber; ?><br />    			
    		</b>
    	</h3>    		
    	</center>
    	<hr />
    	<center>
    		<h4>PASSWORD RESET</h4>
    		<form method="post" enctype="multipart/form-data" >
				<div class="form-group findworkergroup">
					<label>First name</label>
					<input id="inputState" name="user_password" placeholder="Password" type="password" class="form-control" />
				</div>
				<button type="submit" name="btn_reset_password" class="btn btn-primary btn-block findworkergroup">Change password</button>
			</form>
    	</center>
    	

    <?php } ?>	
</div>

</div>



<?php require_once 'navigation/bottom.php'; ?>