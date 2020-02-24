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
              $stmt = $auth_user->runQuery("SELECT * FROM jobs WHERE public_id='$public_id'");
                    $stmt->execute(array());
                    $jobs=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($jobs as $job) { ?>
            <div class="card col-md-2" style="float:left; margin:25px">
              <div style="margin: 5px; width:100%;">
                  <div class="sunken">
                  <center>
                        <!-- <img src="<?php echo $service->profileimage; ?>" alt="image" style="width:100px;height: 100px;border-radius: 50%;border: 2px solid #ff4700;" /><br /><br /> -->
                       <?php echo $job->job_type; ?><br />
                         <?php echo $job->type_of_worker; ?><br />
                          <?php echo $job->your_location; ?><br />
                        <?php echo $job->salary; ?> <br />
                        <?php echo $job->worker_experience; ?><br />
                        <?php echo $job->tribe; ?>  <br />
                        <?php echo $job->language; ?><br />
                          <?php echo $job->job_description; ?><br /> 
                          <form method="POST">  
                          <input type="text"  name="job_id" hidden value="<?php echo $job->job_id; ?>">
                          <button class="btn createservice" type="submit" name="deletejob" >Delete</button>
                        </form>
                    </center>
                  </div>         
                </div>

            </div>   

            <?php } ?>        

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>

                   