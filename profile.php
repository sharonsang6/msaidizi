<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row" style="width: 100% !important;">
<style type="text/css">
	.findworkergroup{
		width: 100%;
	}
</style>

       
<?php
     if ($userRow['user_account'] == "employer") { ?>
	 <div class="container">
	 <div class="row">
<div class="col-md-6 card profilecard">
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM profile WHERE `public_id`=$public_id ");
	$stmt->execute(array(':public_id'=>$public_id));
	$user_profile=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() == 1){ ?>
		<form method="post" enctype="multipart/form-data" >
		<p><strong>Please edit your profile by filling the form below</strong></p>
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" pattern="\D+" placeholder="first name" required type="text" class="form-control" value="<?php echo $user_profile['first_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" pattern="\D+" placeholder="middle name" type="text" class="form-control" value="<?php echo $user_profile['middle_name']; ?>"/>
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" pattern="\D+" placeholder="last name" required type="text" class="form-control" value="<?php echo $user_profile['last_name']; ?>"/>
			</div>
			<div class="form-group findworkergroup">
				<label>ID No/Passport No</label>
				<input id="inputState" name="national_id"  maxlength="10"  type="number" required class="form-control" value="<?php echo $user_profile['national_id']; ?>"/>
			</div>

			<div class="form-group findworkergroup">
				<label>Gender</label>
				<select id="inputState" name="gender" placeholder="" type="text" class="form-control" >
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Tribe</label>
				<select id="inputState" name="tribe" placeholder="" type="text" class="form-control" >
						    <option>Ameru</option>
            <option>Embu</option>
            <option>Kalenjin</option>
            <option>Kamba</option>
            <option>Kikuyu</option>
            <option>Kisii</option>
            <option>Kuria</option>
            <option>Luhya</option>
            <option>Luo</option>
            <option>Maasai</option>
            <option>Mijikenda</option>
            <option>Orma</option>
            <option>Rendile</option>
            <option>Samburu</option>
            <option>Somali</option>
            <option>Suba</option>
            <option>Swahili</option>
            <option>Taita</option>
            <option>Taveta</option>
            <option>Turkana</option>
            <option>Gabra</option>
            <option>Mbeere</option>
            <option>Nubia</option>
            <option>Tharaka</option>
            <option>IIchamus</option>
            <option>Njemps</option>
            <option>Borana</option>
            <option>Galla</option>
            <option>Gosha</option>
            <option>Konso</option>
            <option>Sakuye</option>
            <option>Waat</option>
            <option>Isaak</option>
            <option>Walwana</option>
            <option>Dasenach</option>
            <option>Galjeel</option>
            <option>Leysan</option>
            <option>Bulji</option>
            <option>Teso</option>
            <option>Arab</option>
            <option>Asian</option>
            <option>European</option>
            <option>American</option>
            <option>Other</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<select id="inputState" name="country" placeholder="Country" type="text" class="form-control" >
							<option value="Kenya">Kenya</option>
							<option value="Uganda">Uganda</option>
							<option value="Tanzania">Tanzania</option>
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<select id="inputState" name="town" placeholder="town" type="text" class="form-control" >
				<?php require_once 'list.php'; ?>
						</select>
				<!-- <input id="inputState" name="town" placeholder="town" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number <i>(format... +254..)</i></label>
				<input id="inputState" name="phonenumber"  required   min="10" type="number" class="form-control" value="<?php echo $user_profile['phonenumber']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" required placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup createservice">Update profile</button>
		</form>
	<?php }else{ ?>
		<form method="post" enctype="multipart/form-data" >
		<p><strong>Please edit your profile by filling the form below</strong></p>
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" pattern="\D+" placeholder="first name" required type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" pattern="\D+" placeholder="middle name" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" pattern="\D+" placeholder="last name" required type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>ID No/Passport No</label>
				<input id="inputState" name="national_id" maxlength="10" required title="5 to 10 characters"    type="number" required class="form-control" />
			</div>

			<div class="form-group findworkergroup">
				<label>Gender</label>
				<select id="inputState" name="gender" placeholder="" type="text" class="form-control" >
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Tribe</label>
				<select id="inputState" name="tribe" placeholder="" type="text" class="form-control" >
						    <option>Ameru</option>
            <option>Embu</option>
            <option>Kalenjin</option>
            <option>Kamba</option>
            <option>Kikuyu</option>
            <option>Kisii</option>
            <option>Kuria</option>
            <option>Luhya</option>
            <option>Luo</option>
            <option>Maasai</option>
            <option>Mijikenda</option>
            <option>Orma</option>
            <option>Rendile</option>
            <option>Samburu</option>
            <option>Somali</option>
            <option>Suba</option>
            <option>Swahili</option>
            <option>Taita</option>
            <option>Taveta</option>
            <option>Turkana</option>
            <option>Gabra</option>
            <option>Mbeere</option>
            <option>Nubia</option>
            <option>Tharaka</option>
            <option>IIchamus</option>
            <option>Njemps</option>
            <option>Borana</option>
            <option>Galla</option>
            <option>Gosha</option>
            <option>Konso</option>
            <option>Sakuye</option>
            <option>Waat</option>
            <option>Isaak</option>
            <option>Walwana</option>
            <option>Dasenach</option>
            <option>Galjeel</option>
            <option>Leysan</option>
            <option>Bulji</option>
            <option>Teso</option>
            <option>Arab</option>
            <option>Asian</option>
            <option>European</option>
            <option>American</option>
            <option>Other</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<select id="inputState" name="country" placeholder="Country" type="text" class="form-control" >
							<option value="Kenya">Kenya</option>
							<option value="Uganda">Uganda</option>
							<option value="Tanzania">Tanzania</option>
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<select id="inputState" name="town" placeholder="town" type="text" class="form-control" >
				<?php require_once 'list.php'; ?>
						</select>
				<!-- <input id="inputState" name="town" placeholder="town" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number <i>(format... +254..)</i></label>
				<input id="inputState" name="phonenumber"  required   min="10" type="number" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" required placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup createservice">Update profile</button>
		</form>
	<?php }
?>

</div>
<?php
if (isset($_GET['pesapal_transaction_tracking_id'])) {
	$pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	$pesapal_merchant_reference = $_GET['pesapal_merchant_reference']; 
	?>

<head>
    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
    <title>div print</title>
</head>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container " id="mainC">
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">

<body>
<div id="div_print">
        <h1 style="Color:Red">The Div content which you want to print</h1>
		<div class="myDiv">
			<?php echo $userRow['user_name']; ?><br />
			<?php echo $userRow['user_name']; ?><br />
			Tracking ID: <?php echo $pesapal_transaction_tracking_id; ?><br />
			Payment ref: <?php echo $pesapal_merchant_reference; ?>
		</div>
    </div>
</body>

        </div>
        <div class="modal-footer">
        	<script type="text/javascript">
        		function myFunction() {
  var x = document.getElementById("mainC");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
        	</script>
<button onclick="myFunction()">CLOSE</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" onClick="printdiv('div_print');">PRINT</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


	<?php
                
    $stmt = $auth_user->runQuery("UPDATE `users` SET `premium`='1', `pesapal_transaction_tracking_id`='$pesapal_transaction_tracking_id', `pesapal_merchant_reference`='$pesapal_merchant_reference' WHERE `public_id`='$public_id' ");
    $stmt->bindparam("1", $premium); 
    $stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id); 
    $stmt->bindparam(":pesapal_merchant_reference", $pesapal_merchant_reference); 
    $stmt->execute();
    $alert = "Premium activated";


	// $stmt = $auth_user->runQuery("INSERT INTO payments(pesapal_transaction_tracking_id, amount, pesapal_merchant_reference) VALUES(:pesapal_transaction_tracking_id, '350', :pesapal_merchant_reference)");
 //    $stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id); 
 //    $stmt->bindparam(":amount", '350'); 
 //    $stmt->bindparam(":pesapal_merchant_reference", $pesapal_merchant_reference); 
 //    $stmt->execute();
    	$pesapal_transaction_tracking_id = $pesapal_transaction_tracking_id;
		$amount = 350;
		$pesapal_merchant_reference = $pesapal_merchant_reference;

		try {
			if($user->postStat($pesapal_transaction_tracking_id, $amount, $pesapal_merchant_reference)){  
				$alert = "posted";
			}
		}
		catch(PDOException $e){
			$alert = $e->getMessage();
		}
}

?>   
<!--  -->
<div class="col-md-6 card profilecard">
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
					<input id="inputState" name="user_password" required placeholder="Password" type="password" class="form-control" />
				</div>
				<div class="form-group findworkergroup">
					<input id="inputState" name="cfuser_password" required placeholder="Confirm Password" type="password" class="form-control" />
				</div>
				<button type="submit" name="btn_reset_password" class="btn btn-primary btn-block findworkergroup createservice">Change password</button>
			</form>
    	</center>
    	

    <?php } ?>	
</div>
</div>
</div></div>

	 <?php }
	 
     ?>

         
<?php
     if ($userRow['user_account'] == "worker") { ?>
	 
<div class="col-md-3 card profilecard">
<?php
	$stmt = $auth_user->runQuery("SELECT * FROM profile WHERE `public_id`=$public_id ");
	$stmt->execute(array(':public_id'=>$public_id));
	$user_profile=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() == 1){ ?>
		<form method="post" enctype="multipart/form-data" >
		<p><strong>Please edit your profile by filling the form below</strong></p>
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" pattern="\D+" placeholder="first name" required type="text" class="form-control" value="<?php echo $user_profile['first_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" pattern="\D+" placeholder="middle name"  type="text" class="form-control" value="<?php echo $user_profile['middle_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" pattern="\D+" placeholder="last name" type="text" required class="form-control" value="<?php echo $user_profile['last_name']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>ID No/Passport No</label>
				<input id="inputState" name="national_id" maxlength="10" required title="5 to 10 characters"  placeholder="id/passport" type="text" required class="form-control" value="<?php echo $user_profile['national_id']; ?>" />
			</div>

			<div class="form-group findworkergroup">
				<label>Gender</label>
				<select id="inputState" name="gender" placeholder="" type="text" class="form-control" >
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							
						</select>
				<!--
				 <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Tribe</label>
				<select id="inputState" name="tribe" placeholder="" type="text" class="form-control" >
							    <option>Ameru</option>
            <option>Embu</option>
            <option>Kalenjin</option>
            <option>Kamba</option>
            <option>Kikuyu</option>
            <option>Kisii</option>
            <option>Kuria</option>
            <option>Luhya</option>
            <option>Luo</option>
            <option>Maasai</option>
            <option>Mijikenda</option>
            <option>Orma</option>
            <option>Rendile</option>
            <option>Samburu</option>
            <option>Somali</option>
            <option>Suba</option>
            <option>Swahili</option>
            <option>Taita</option>
            <option>Taveta</option>
            <option>Turkana</option>
            <option>Gabra</option>
            <option>Mbeere</option>
            <option>Nubia</option>
            <option>Tharaka</option>
            <option>IIchamus</option>
            <option>Njemps</option>
            <option>Borana</option>
            <option>Galla</option>
            <option>Gosha</option>
            <option>Konso</option>
            <option>Sakuye</option>
            <option>Waat</option>
            <option>Isaak</option>
            <option>Walwana</option>
            <option>Dasenach</option>
            <option>Galjeel</option>
            <option>Leysan</option>
            <option>Bulji</option>
            <option>Teso</option>
            <option>Arab</option>
            <option>Asian</option>
            <option>European</option>
            <option>American</option>
            <option>Other</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<select id="inputState" name="country" placeholder="Country" type="text" class="form-control" >
							<option value="Kenya">Kenya</option>
							<option value="Uganda">Uganda</option>
							<option value="Tanzania">Tanzania</option>
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<select id="inputState" name="town" placeholder="town" type="text" class="form-control" >
				<?php require_once 'list.php'; ?>
						</select>
				<!-- <input id="inputState" name="town" placeholder="town" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number <i>(format... +254..)</i></label>
				<input id="inputState" name="phonenumber"  required  min="10" type="number" class="form-control" value="<?php echo $user_profile['phonenumber']; ?>" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" required placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup createservice">Update profile</button>
		</form>
	<?php }else{ ?>
		<form method="post" enctype="multipart/form-data" >
		<p><strong>Please edit your profile by filling the form below</strong></p>
			<div class="form-group findworkergroup">
				<label>First name</label>
				<input id="inputState" name="first_name" pattern="\D+" placeholder="first name" required type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Middle name</label>
				<input id="inputState" name="middle_name" pattern="\D+" placeholder="middle name" type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Last name</label>
				<input id="inputState" name="last_name" pattern="\D+" placeholder="last name" required type="text" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>ID No/Passport No</label>
				<input id="inputState" name="national_id" maxlength="10"  required title="5 to 10 characters"  type="number" required class="form-control" />
				</div>

			<div class="form-group findworkergroup">
				<label>Gender</label>
				<select id="inputState" name="gender" placeholder="" type="text" class="form-control" >
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Tribe</label>
				<select id="inputState" name="tribe" placeholder="" type="text" class="form-control" >
						    <option>Ameru</option>
            <option>Embu</option>
            <option>Kalenjin</option>
            <option>Kamba</option>
            <option>Kikuyu</option>
            <option>Kisii</option>
            <option>Kuria</option>
            <option>Luhya</option>
            <option>Luo</option>
            <option>Maasai</option>
            <option>Mijikenda</option>
            <option>Orma</option>
            <option>Rendile</option>
            <option>Samburu</option>
            <option>Somali</option>
            <option>Suba</option>
            <option>Swahili</option>
            <option>Taita</option>
            <option>Taveta</option>
            <option>Turkana</option>
            <option>Gabra</option>
            <option>Mbeere</option>
            <option>Nubia</option>
            <option>Tharaka</option>
            <option>IIchamus</option>
            <option>Njemps</option>
            <option>Borana</option>
            <option>Galla</option>
            <option>Gosha</option>
            <option>Konso</option>
            <option>Sakuye</option>
            <option>Waat</option>
            <option>Isaak</option>
            <option>Walwana</option>
            <option>Dasenach</option>
            <option>Galjeel</option>
            <option>Leysan</option>
            <option>Bulji</option>
            <option>Teso</option>
            <option>Arab</option>
            <option>Asian</option>
            <option>European</option>
            <option>American</option>
            <option>Other</option>
							
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Country</label>
				<select id="inputState" name="country" placeholder="Country" type="text" class="form-control" >
				<option value="Kenya">Kenya</option>
							<option value="Uganda">Uganda</option>
							<option value="Tanzania">Tanzania</option>
						</select>
				<!-- <input id="inputState" name="country" placeholder="Country" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Town</label>
				<select id="inputState" name="town" placeholder="town" type="text" class="form-control" >
				<?php require_once 'list.php'; ?>
						</select>
				<!-- <input id="inputState" name="town" placeholder="town" type="text" class="form-control" /> -->
			</div>
			<div class="form-group findworkergroup">
				<label>Phone number <i>(format... +254..)</i></label>
				<input id="inputState" name="phonenumber"  required  min="10" type="number" class="form-control" />
			</div>
			<div class="form-group findworkergroup">
				<label>Profile image</label>
				<input id="inputState" name="profileimage" type="file" required placeholder="Profile image"  class="form-control" />
			</div>
			<button type="submit" name="submitprofile" class="btn btn-primary btn-block findworkergroup createservice">Update profile</button>
		</form>
	<?php }
?>

</div>
              
<div class="col-md-6 sunken">

<div class="btn-group btn-group-lg" role="group" aria-label="Basic example" style="width: 100%;">
  <!-- <button type="button" class="btn btn-secondary" style="width: inherit;">Left</button> -->
  <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#exampleModalCenter" style="width: inherit;">Create service</button>
</div>	



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
					<input id="inputState" name="idimage"  placeholder="National ID" type="file" class="form-control" />
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
					<input id="inputState" name="job" value="<?php echo isset($_POST["job"]) ? $_POST["job"] : ''; ?>" placeholder="Job" type="text" class="form-control" />
				</div>
				<div class="form-group findworkergroup">
					<label>Enter job experience ( years ) </label>
					<input id="inputState" min="0" name="experience" placeholder="Experience" type="number" value="<?php echo isset($_POST["experience"]) ? $_POST["experience"] : ''; ?>"  class="form-control" />
				</div>
				
				<div class="form-group findworkergroup">
				<label>Town</label>
				<select id="inputState" name="town" placeholder="town" type="text" class="form-control" >
				<option>Nairobi</option>
            <option>Kisumu</option>
            <option>Narok</option>
            <option>Mombasa</option>
            <option>Eldoret</option>
            <option>Kericho</option>
            <option>Nakuru</option>
            <option>Lamu</option>
            <option>Kisii</option>
            <option>Malindi</option>
            <option>Bungoma</option>
            <option>Baragoi</option>
            <option>Butere</option>
            <option>Dadaab</option>
            <option>Diani Beach</option>
            <option>Emali</option>
            <option>Embu</option>
            <option>Garissa</option>
            <option>Gede</option>
            <option>Hola</option>
            <option>Homa Bay</option>
            <option>Isiolo</option>
            <option>Kitui</option>
            <option>Kibwez</option>
            <option>Kajiado</option>
            <option>Kakamega</option>
            <option>Kakuma</option>
            <option>Kapenguria</option>
            <option>Keroka</option>
            <option>Kiambu            </option>
            <option>Kilifi</option>
            <option>Langata</option>
            <option>Litein</option>
            <option>Lodwar</option>
            <option>Lokichoggio</option>
            <option>Londiani</option>
            <option>Loyangalani</option>
            <option>Machakos</option>
            <option>Makindu</option>
            <option>Mandera</option>
            <option>Marlal</option>
            <option>Marsabit</option>
            <option>Meru</option>
            <option>Moyale</option>
            <option>Mumias</option>
            <option>Muranga</option>
            <option>Mutomo</option>
            <option>Naivasha</option>
            <option>Namanga</option>
            <option>Nanyuki</option>
            <option>Naro Moru</option>
            <option>Nyahururu</option>
            <option>Nyeri</option>
            <option>Ruiru</option>
            <option>Shimoni</option>
            <option>Takaungu</option>
            <option>Thika</option>
            <option>Vihiga</option>
            <option>Voi</option>
            <option>Wajir</option>
            <option>Watamu</option>
            <option>Webuye</option>
            <option>Wote</option>
            <option>Wundanyi</option>
            <option>Other</option>
						</select>
				<!-- <input id="inputState" name="town" placeholder="town" type="text" class="form-control" /> -->
			</div>
				<div class="form-group findworkergroup">
					<label>Enter service description <i>Maximum of 30 words</i> </label>
					<textarea rows="3" id="inputState " min="0" name="description" placeholder="Service description" value="<?php echo isset($_POST["description"]) ? $_POST["description"] : ''; ?>" type="text" class="form-control postserve"></textarea>
					<script>
								$(document).ready(function() {
						$(".postserve").on('keyup', function() {
							var words = this.value.match(/\S+/g).length;

							if (words > 30) {
							// Split the string on first 200 words and rejoin on spaces
							var trimmed = $(this).val().split(/\s+/, 30).join(" ");
							// Add a space at the end to make sure more typing creates new words
							$(this).val(trimmed + " ");
							}
							else {
							$('#display_count').text(words);
							$('#word_left').text(30-words);
							}
						});
						});           
       </script>
				</div>
				<div class="form-group findworkergroup">
					<label>Cost per day ( Ksh ) </label>
					<input id="inputState" min="0" name="cost" value="<?php echo isset($_POST["cost"]) ? $_POST["cost"] : ''; ?>" placeholder="Enter service cost" type="number" class="form-control" />
				</div>
				<button type="submit" name="service_post" class="btn btn-primary btn-block findworkergroup">Post service</button>
			</form>
		</center>
	<?php } ?>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-secondary createservice" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>

<center>My services</center>
<?php
$stmt = $auth_user->runQuery("SELECT * FROM services WHERE public_id='$public_id' AND `service_status`=1 ORDER BY `services_reg_date` DESC ");
$stmt->execute(array());
$services=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($services as $service) { ?>
	<div class="card row" style="margin:10px;">
	  <div class="modal-dialog" style="margin: 5px;">
			<div class="sunken">
				<div class="d-flex w-100 justify-content-between">
				  <h5 class="mb-1"><?php echo $service->typeofworker; ?></h5>
				  <small class="text-muted"><?php echo $service->job; ?></small>
				</div>
				Work experience: <?php echo $service->experience; ?> year(s)
				<?php echo $service->description; ?><br />
				<div class="d-flex w-100 justify-content-between">
				  <h5 class="mb-1"><?php echo $service->town; ?><br /></h5>
				  <small class="text-muted">Ksh <?php echo $service->cost; ?> per day</small>
				</div>
			</div>
		</div>
		<div class="btn-group btn-group-sm " role="group" aria-label="Basic example" style="width: 100%;">
			  <a href="work.php?servics=<?php echo $service->services_id; ?>"><button type="button" class="btn btn-primery createservice" style="width: inherit;">View</button></a>
		 
		  <form method="POST">  
                          <input type="text"  name="services_id" hidden value="<?php echo $service->services_id; ?>">
                          <button class="btn createservice" type="submit" name="deleteservice" >Delete</button>
                        </form>
						</div>
	</div>    	
<?php } ?>

</div>
<div class="col-md-3 card profilecard">
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
					<input id="inputState" name="user_password" required placeholder="Password" type="password" class="form-control" />
				</div>
				<div class="form-group findworkergroup">
					<input id="inputState" name="cfuser_password" required placeholder="Confirm Password" type="password" class="form-control" />
				</div>
				<button type="submit" name="btn_reset_password" class="btn btn-primary btn-block findworkergroup createservice">Change password</button>
			</form>
    	</center>
    	

    <?php } ?>	
</div>

</div>

     <?php }
     ?>





<?php require_once 'navigation/bottom.php'; ?>