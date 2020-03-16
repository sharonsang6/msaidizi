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
          <form method="GET"  >
        <div class="form-group">
          <label for="exampleFormControlSelect1">Job type</label>
          <select class="form-control postjobinput" name="job_type" id="exampleFormControlSelect1">
            <option>Nanny</option>
            <option>Caregiver</option>
            <option>Gardener</option>
            <option>Other</option>
            <option>Plumber</option>
            <option>Childcare</option>
            <option>Laundry</option>
            <option>Electrician</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type of Worker</label>
          <select class="form-control postformselect" name="type_of_worker"id="exampleFormControlSelect1">
            <option>Indoor</option>
            <option>Outdoor</option>
           
         
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Location</label>
          <select class="form-control postformselect" name="your_location"id="exampleFormControlSelect1">
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
        </div>
          
            
                              
           <div class="form-group">
          <label for="exampleFormControlInput1">Salary (per day)</label>
          <input type="number" class="form-control postjobinput" pattern="d{1+}"  required name="salary"id="exampleFormControlInput1" >
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">Experience(years)</label>
          <input type="number" max="3"class="form-control postjobinput" required pattern="d{0+}" name="worker_experience" id="exampleFormControlInput1" >
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
          if (isset($_GET['filterjobs'])) {
			$job_type = $_GET['job_type'];	
			$type_of_worker = $_GET['type_of_worker'];	
			$your_location = $_GET['your_location'];	
			$salary = $_GET['salary'];	
			$worker_experience = $_GET['worker_experience'];	
			           

            $stmt = $auth_user->runQuery("SELECT * FROM jobs 
              LEFT JOIN users 
              ON `users`.`public_id`=`jobs`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE 
`jobs`.`job_type`='$job_type' AND
`jobs`.`type_of_worker`='$type_of_worker' AND
`jobs`.`your_location`='$your_location' AND
`jobs`.`salary`>='$salary' AND
`jobs`.`worker_experience`>='$worker_experience'
               ORDER BY `date_created` DESC ");
              $stmt->execute(array());
              $jobs=$stmt->rowCount();
              if ($jobs > 0) { echo "FOUND"; ?>
              <?php
              $stmt = $auth_user->runQuery("SELECT * FROM jobs 
              LEFT JOIN users 
              ON `users`.`public_id`=`jobs`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id` WHERE
`jobs`.`job_type`='$job_type' AND
`jobs`.`type_of_worker`='$type_of_worker' AND
`jobs`.`your_location`='$your_location' AND
`jobs`.`salary`>='$salary' AND
`jobs`.`worker_experience`>='$worker_experience'
                ORDER BY `date_created` DESC   ");
              $stmt->execute(array());
              $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
              foreach ($jobs as $job) { ?>
              <div class="card" style="width: 48%;float:left;margin: 0.5%;">
                <div class="modal-dialog" style="margin: 5px;max-width: 98%;">
                    <div class="sunken">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $job->type_of_worker; ?></h5>
                        <small class="text-muted"><?php echo $job->job_type; ?></small>
                      </div>
                     <strong>Work experiance:</strong>  <?php echo $job->worker_experience; ?> year(s)<br />
                     <strong>Description: </strong>  <?php echo $job->job_description; ?><br />
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
                  <?php } ?>
                    <?php if ($job->your_file == "") { ?>
                     <?php }else{ ?>
                  	<a href="<?php echo $job->your_file; ?>" readonly target="_newTab">View document</a>  
                     <?php } ?>

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
              ON `profile`.`public_id`=`users`.`public_id` ORDER BY `date_created` DESC");
            $stmt->execute(array());
            $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($jobs as $job) { ?>
            <div class="card" style="width: 48%;float:left;margin: 0.5%;">
              <div class="modal-dialog" style="margin: 5px;max-width: 98%;">
                  <div class="sunken">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?php echo $job->type_of_worker; ?></h5>
                      <small class="text-muted"><?php echo $job->job_type; ?></small>
                    </div>
                    <strong>Work experiance:</strong>  <?php echo $job->worker_experience; ?> year(s)<br />
                   <strong>Description: </strong>  <?php echo $job->job_description; ?><br />
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
                    <?php if ($job->your_file == "") { ?>
                     <?php }else{ ?>
                  	<a href="<?php echo $job->your_file; ?>" readonly target="_newTab">View document</a>  
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