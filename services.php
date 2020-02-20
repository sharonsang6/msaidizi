<?php require_once 'header/header.php'; ?>
<?php //require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if ($userRow['user_account'] == "worker") {
	echo '<script type="text/javascript">window.location = "profile.php"</script>';
}
?>
<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row findworker" >
  <style type="text/css">
  .findworkergroup{
  width: 100%;
  }
  </style>            
  <div class="col-md-3 card">
  <p style="margin-top:20px">Filter your search by specifying the type of worker you need</p>
          <form method="get" enctype="multipart/form-data" >
          <div class="form-group findworkergroup">
            <label>Select type of worker</label>
            <select id="inputState" name="typeofworker" placeholder="Type of worker" type="text" class="form-control" >
              <option value="Indoor">Indoor</option>
              <option value="Outdoor">Outdoor</option>
            </select>
          </div>
          <div class="form-group findworkergroup">
            <label>Enter job title</label>
            <select id="inputState" name="job" placeholder="Job" type="text" class="form-control">
              <?php
              $stmt = $auth_user->runQuery("SELECT job FROM services ");
              $stmt->execute(array());
              $servicess=$stmt->fetchAll(PDO::FETCH_OBJ);
              foreach ($servicess as $s) { ?><option value="<?php echo $s->job; ?>"><?php echo $s->job; ?></option><?php } ?>
            </select>
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
            <label>Cost per day ( Ksh ) </label>
            <input id="inputState" min="0" name="cost" placeholder="Enter service cost" type="number" class="form-control" />
          </div>
          <button type="submit" name="filter" class="btn btn-primary btn-block findworkergroup createservice">Filter</button>
        </form>
  </div>
<style>
.flexbox-container {
  display: -ms-flex;
}

/*.flexbox-container > div {
  padding: 10px;
}

.flexbox-container > div:first-child {
  margin-right: 20px;
}*/
</style>
  <div class="col-md-9 sunken">
    <div class="rows flexbox-container">


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

?>


        <?php
          if (isset($_GET['typeofworker'])) {
            $typeofworker = $_GET['typeofworker'];
            $job = $_GET['job'];
            $experiance = $_GET['experiance'];
            $town = $_GET['town'];
            $cost = $_GET['cost'];


            $stmt = $auth_user->runQuery("SELECT * FROM services 
              LEFT JOIN users 
              ON `users`.`public_id`=`services`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE `services`.`typeofworker`='$typeofworker' AND `services`.`job`='$job' AND `services`.`experiance`>'$experiance' AND `services`.`town`='$town' AND `services`.`cost`>'$cost' ");
              $stmt->execute(array());
              $services=$stmt->rowCount();
              if ($services > 0) { ?>
              <?php
              $stmt = $auth_user->runQuery("SELECT * FROM services 
              LEFT JOIN users 
              ON `users`.`public_id`=`services`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE `services`.`typeofworker`='$typeofworker' AND `services`.`job`='$job' AND `services`.`experiance`>='$experiance' AND `services`.`town`='$town' AND `services`.`cost`>='$cost' ");
              $stmt->execute(array());
              $services=$stmt->fetchAll(PDO::FETCH_OBJ);
              foreach ($services as $service) { ?>
              <div class="card" style="width: 48%;float:left;margin: 0.5%;">
                <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
                    <div class="sunken">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $service->typeofworker; ?></h5>
                        <small class="text-muted"><?php echo $service->job; ?></small>
                      </div>
                      Work experiance: <?php echo $service->experiance; ?> year(s)
                      <?php echo $service->description; ?><br />
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $service->user_name; ?> - <?php echo $service->allrating; ?></h5>
                        <small class="text-muted">Ksh <?php echo $service->cost; ?> per day</small>
                      </div>
                    </div>                             
                  </div>
                 <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
                    <button type="button" class="btn btn-secondary" style="width: inherit;" data-toggle="collapse" data-target="#jo<?php echo $service->services_id; ?>is" aria-expanded="false" aria-controls="jo<?php echo $service->services_id; ?>is">Hire service</button>
                    <button type="button" class="btn btn-secondary" style="width: inherit;"  data-toggle="modal" data-target="#<?php echo $service->user_name; ?>">View worker</button>
                  </div>  
                  <div class="collapse" id="jo<?php echo $service->services_id; ?>is">
                    <div class="card card-body">
                      <form method="post" enctype="multipart/form-data" >
                        <div class="form-group findworkergroup">
                          <input id="inputState" name="worker_id" placeholder="Duration" type="text" value="<?php echo $service->public_id; ?>" class="form-control" />
                        </div>
                        <div class="form-group findworkergroup">
                          <label>Select start date</label>
                          <input id="inputState" name="start_date" placeholder="Start date" type="date" class="form-control" />
                        </div>
                        <div class="form-group findworkergroup">
                          <label>Job duration in days</label>
                          <input id="inputState" min="1" name="duration" placeholder="Duration" type="number" class="form-control" />
                        </div>
                        <button type="submit" name="make_offer_post" class="btn btn-primary btn-block findworkergroup createservice">Post service</button>
                      </form>
                    </div>
                  </div>
              </div> 
            <div class="modal fade" id="<?php echo $service->user_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $service->user_name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
                   
              <?php } ?>        
              <?php }else{ ?>
                <div class="card" style="width: 48%;float:left;margin: 0.5%;padding: 10%;font-size: xx-large;text-align: center;">
                NO SERVICE FOUND
                </div>
              <?php } ?>

            <?php
          }else{ ?>
            <?php
            $stmt = $auth_user->runQuery("SELECT * FROM services 
              LEFT JOIN users 
              ON `users`.`public_id`=`services`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` ");
            $stmt->execute(array());
            $services=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($services as $service) { ?>
            <div class="card" style="width: 48%;float:left;margin: 0.5%;">
              <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
                  <div class="sunken">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?php echo $service->typeofworker; ?></h5>
                      <small class="text-muted"><?php echo $service->job; ?></small>
                    </div>
                    Work experiance: <?php echo $service->experiance; ?> year(s)
                    <?php echo $service->description; ?><br />
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $service->user_name; ?> - <?php echo $service->allrating; ?></h5>
                      <small class="text-muted">Ksh <?php echo $service->cost; ?> per day</small>
                    </div>
                  </div>         
                </div>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
                    <?php if($user->is_loggedin()=="") { ?>
                        
                            <button type="button" class="btn btn-secondary" style="width: inherit;"><a href="login.php">Login to hire</a></button>
                        
                    <?php }else{ ?>
                        <button type="button" class="btn btn-secondary" style="width: inherit;" data-toggle="collapse" data-target="#jo<?php echo $service->services_id; ?>is" aria-expanded="false" aria-controls="jo<?php echo $service->services_id; ?>is">Hire service</button>
                    <?php } ?>


                    <button type="button" class="btn btn-secondary" style="width: inherit;"  data-toggle="modal" data-target="#<?php echo $service->user_name; ?>">View worker</button>
                  </div>  
                  <div class="collapse" id="jo<?php echo $service->services_id; ?>is">
                    <div class="card card-body">
                      <form method="post" enctype="multipart/form-data" >
                        <div class="form-group findworkergroup">
                        <input id="inputState" name="services_id" placeholder="Duration" type="text" value="<?php echo $service->services_id; ?>" class="form-control" />
                        <input id="inputState" name="worker_id" placeholder="Duration" type="text" value="<?php echo $service->public_id; ?>" class="form-control" />
                        </div>
                        <div class="form-group findworkergroup">
                          <label>Select start date</label>
                          <input id="inputState" name="start_date" placeholder="Start date" type="date" class="form-control" />
                        </div>
                        <div class="form-group findworkergroup">
                          <label>Job duration in days</label>
                          <input id="inputState" min="1" name="duration" placeholder="Duration" type="number" class="form-control" />
                        </div>
                        <button type="submit" name="make_offer_post" class="btn btn-primary btn-block findworkergroup">Post service</button>
                      </form>
                    </div>
                  </div>

            </div>

            <div class="modal fade" id="<?php echo $service->user_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Contact me<a href="https://api.whatsapp.com/send?phone=<?php echo $service->phonenumber; ?>" class="fa fa-whatsapp" style="color:green;font-size: 50px;text-decoration: none;"  ></a></h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                    $stmt = $auth_user->runQuery("SELECT * FROM  users 
                      LEFT JOIN profile 
                      ON `profile`.`public_id`=`users`.`public_id`
                      WHERE `user_name`='".$service->user_name."' ");
                    $stmt->execute(array());
                    $profiles=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($profiles as $profile) { ?>
                        <center>
                        User: <?php echo $profile->user_name; ?><br />
                        Legal name: <?php echo $profile->first_name; ?> <?php echo $profile->middle_name; ?> <?php echo $profile->last_name; ?><br />
                        Location: <?php echo $profile->country; ?> - <?php echo $profile->town; ?><br />
                        Email: <a href="mailto:<?php echo $profile->user_email; ?>"><?php echo $profile->user_email; ?></a><br />
                        Phone number: <a href="tel:<?php echo $profile->phonenumber; ?>"><?php echo $profile->phonenumber; ?></a><br />
                        <div style="display: flex;flex-direction: row;">
                            <img style="width: 50%;" src="<?php echo $profile->profileimage; ?>" />
                            <img style="width: 50%;" src="<?php echo $profile->idimage; ?>" />
                        </div>
                        Ratting: <?php echo $profile->allrating; ?> stars<br />
                        </center>
                    <?php } ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>        
          <?php } ?>        

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>