<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if ($userRow['user_account'] != "employer") {
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

<style>
.flexbox-container {
  display: -ms-flex;
}

</style>
 <div class="col-md-12 sunken ">
    <div class="row flexbox-container">

            <?php
              $stmt = $auth_user->runQuery("SELECT * FROM jobs WHERE public_id='$public_id' AND `job_status`=1 ORDER BY `date_created` DESC");
                    $stmt->execute(array());
                    $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($jobs as $job) { ?>
            <div class="card col-md-2" style="float:left; margin:25px">
              <div style="margin: 5px; width:100%;">
                  <div class="sunken">
                
                        <!-- <img src="<?php echo $service->profileimage; ?>" alt="image" style="width:100px;height: 100px;border-radius: 50%;border: 2px solid #ff4700;" /><br /><br /> -->
                    <strong>Type of Job:</strong> <?php echo $job->job_type; ?><br />
                    <strong>Type of Worker:</strong> <?php echo $job->type_of_worker; ?><br />
                    <strong>Location:</strong> <?php echo $job->your_location; ?><br />
                    <strong>Salary(per day):</strong>  <?php echo $job->salary; ?> <br />
                    <strong>Work experince:</strong>  <?php echo $job->worker_experience; ?><br />
                    <strong>Tribe: </strong><?php echo $job->tribe; ?>  <br />
                    <strong>Description:</strong><?php echo $job->job_description; ?><br /> 
                    <?php if ($job->your_file == "") { ?>
                     <?php }else{ ?>
                    <a href="<?php echo $job->your_file; ?>" readonly target="_newTab">View document</a>  
                     <?php } ?>

                    
                          <form method="POST">  
                          <input type="text"  name="job_id" hidden value="<?php echo $job->job_id; ?>">
                          <button class="btn createservice" type="submit" name="deletejob" >Delete</button>
                       
                       
                        </form>
                  
                  </div>         
                </div>

            </div>   

            <?php } ?>        

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>

                   