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
            <div class="card col-md-2" style="float:left; margin:25px">
            
                           <center>
                             
                             <?php
                                $stmt = $auth_user->runQuery("SELECT COUNT(*) FROM users;");
                                      $stmt->execute();
                                      $users=$stmt->rowCount();
                             ?>  
                             <p>Users</p>
                             <?php echo $users ?>

                                               
                          </center>
                  </div>         
                </div>

           

           
             </div>  

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>

                   