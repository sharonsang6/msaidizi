<?php require_once 'header/header.php'; ?>
<?php //require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if ($userRow['user_account'] !== "worker") {
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
  <p style="margin-top:20px"><strong>Filter your search by specifying the type of job you need</strong></p>
          <form method="get" enctype="multipart/form-data" >
          <div class="form-group findworkergroup">
            <label>Select type of job</label>
            <select id="inputState" name="type_of_worker" placeholder="Type of worker" type="text" class="form-control" >
              <option value="Indoor">Indoor</option>
              <option value="Outdoor">Outdoor</option>
            </select>
          </div>
          <div class="form-group findworkergroup">
            <label>Enter job title</label>
            <select id="inputState" name="job_type" placeholder="Job" type="text" class="form-control">
              <?php
              $stmt = $auth_user->runQuery("SELECT job_type FROM jobs ");
              $stmt->execute(array());
              $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
              foreach ($jobs as $j) { ?><option value="<?php echo $j->job_type; ?>"><?php echo $j->job_type; ?></option><?php } ?>
            </select>
          </div>
          <div class="form-group findworkergroup">
            <label>Enter job experiance ( years ) </label>
            <input id="inputState" min="0" name="worker_experience" placeholder="Experiance" type="number" class="form-control" />
          </div>
          <div class="form-group findworkergroup">
            <label>Select town</label>
            <select id="inputState" name="your_location" placeholder="Town" type="text" class="form-control">
              <?php require_once 'list.php'; ?>
            </select>
          </div>
          <div class="form-group findworkergroup">
            <label>Tribe</label>
            <select id="inputState" name="tribe" placeholder="Town" type="text" class="form-control">
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
          </div>
          <div class="form-group findworkergroup">
            <label>Cost per day ( Ksh ) </label>
            <input id="inputState" min="0" name="salary" placeholder="Enter job cost" type="number" class="form-control" />
          </div>
          <button type="submit" name="filterjobs" class="btn btn-primary btn-block findworkergroup createjob">Filter</button>
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
          if (isset($_POST['type_of_worker'])) {
            $type_of_worker = $_GET['type_of_worker'];
            $job_type = $_GET['job_type'];
            $your_location = $_GET['your_location'];
            $salary = $_GET['salary'];
            $worker_experience = $_GET['worker_experience'];
            $tribe = $_GET['tribe'];
            $job_description = $_GET['job_description'];
           


            $stmt = $auth_user->runQuery("SELECT * FROM jobs 
              LEFT JOIN users 
              ON `users`.`public_id`=`jobs`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE `jobs`.`type_of_worker`='$type_of_worker' AND `jobs`.`job_type`='$job_type'AND `jobs`.`your_location`='$your_location' AND `jobs`.`salary`>'$salary' AND `jobs`.`worker_experience`>'$worker_experience'  AND `jobs`.`tribe`='$tribe' AND `jobs`.`job_description`='$job_description' ");
              $stmt->execute(array());
              $jobs=$stmt->rowCount();
              if ($jobs > 0) { ?>
              <?php
              $stmt = $auth_user->runQuery("SELECT * FROM jobs 
              LEFT JOIN users 
              ON `users`.`public_id`=`jobs`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE `jobs`.`type_of_worker`='$type_of_worker' AND `jobs`.`job_type`='$job_type' AND `jobs`.`your_location`='$your_location' AND `jobs`.`salary`>'$salary' AND `jobs`.`worker_experience`>'$worker_experience'  AND `jobs`.`tribe`='$tribe'AND  `jobs`.`job_description`='$job_description'  ");
              $stmt->execute(array());
              $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
              foreach ($jobs as $job) { ?>
              <div class="card" style="width: 48%;float:left;margin: 0.5%;">
                <div class="modal-dialog" style="margin: 5px;max-width: 80%;">
                    <div class="sunken">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $job->type_of_worker; ?></h5>
                        <small class="text-muted"><?php echo $job->job_type; ?></small>
                      </div>
                      Work experiance: <?php echo $job->worker_experience; ?> year(s)
                      <?php echo $job->job_description; ?><br />
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $job->user_name; ?> - <?php echo $job->allrating; ?></h5>
                        <small class="text-muted"><?php echo $job->tribe; ?></small>
                      </div>
                    </div> 
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $job->user_name; ?> - <?php echo $job->allrating; ?></h5>
                        <small class="text-muted">Ksh <?php echo $job->salary; ?> per day</small>
                      </div>
                    </div>                             
                  </div>
                 <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
                <button type="button" class="btn btn-secondary" style="width: inherit;"  data-toggle="modal" data-target="#<?php echo $job->user_name; ?>">View employer</button>
                  </div>  
                 
              </div> 
           
                 
              <?php } ?>        
              <?php }else{ ?>
                <div class="card" style="width: 48%;float:left;margin: 0.5%;padding: 10%;font-size: xx-large;text-align: center;">
                NO job FOUND
                </div>
              <?php } ?>

            <?php
          }else{ ?>
            <?php
            $stmt = $auth_user->runQuery("SELECT * FROM jobs 
              LEFT JOIN users 
              ON `users`.`public_id`=`jobs`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` ");
            $stmt->execute(array());
            $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($jobs as $job) { ?>
            <div class="card" style="width: 48%;float:left;margin: 0.5%;">
              <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
                  <div class="sunken">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?php echo $job->type_of_worker; ?></h5>
                      <small class="text-muted"><?php echo $job->job_type; ?></small>
                    </div>
                    Work experiance: <?php echo $job->worker_experience; ?> year(s)
                    <?php echo $job->job_description; ?><br />
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $job->user_name; ?> - <?php echo $job->allrating; ?></h5>
                      <small class="text-muted">Ksh <?php echo $job->salary; ?> per day</small>
                    </div>
                  </div>         
                </div>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
                    <?php if($user->is_loggedin()=="") { ?>
                        
                            <button type="button" class="btn btn-secondary" style="width: inherit;"><a href="login.php">Login to hire</a></button>
                        
                    <?php }else{ ?>
                    
                    <?php } ?>


                    <button type="button" class="btn btn-secondary" style="width: inherit;"  data-toggle="modal" data-target="#<?php echo $job->user_name; ?>">View employer</button>
                  </div>  
                  

            </div>

            <div class="modal fade" id="<?php echo $job->user_name; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Contact me<a href="https://api.whatsapp.com/send?phone=<?php echo $job->phonenumber; ?>" class="fa fa-whatsapp" style="color:green;font-size: 50px;text-decoration: none;"  ></a></h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                    $stmt = $auth_user->runQuery("SELECT * FROM  users 
                      LEFT JOIN profile 
                      ON `profile`.`public_id`=`users`.`public_id`
                      WHERE `user_name`='".$job->user_name."' ");
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