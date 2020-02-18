<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if ($userRow['user_account'] == "employer") {
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


  <!-- <div class="col-md-3 card"> -->
  <!-- <p style="margin-top:20px">Filter your search by specifying the type of worker you need</p> -->
  <?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
   $stmt = $auth_user->runQuery("SELECT * FROM offers 
    LEFT JOIN services ON `services`.`public_id`=`offers`.`public_id`
    WHERE offers_id='$id' ");
    $stmt->execute(array());
    $offers=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($offers as $offer) { ?>
          <form method="post" enctype="multipart/form-data" >
          
          <div class="form-group findworkergroup">
            <label>ID </label>
            <input id="inputState" name="offers_id" placeholder="Experiance" type="text" class="form-control" value="<?php echo $offer->offers_id; ?>" />
            <input id="inputState" hidden name="worker_id" placeholder="Experiance" type="text" class="form-control" value="<?php echo $offer->worker_id; ?>" />

          </div>
          <div class="form-group findworkergroup">
            <label>Rate work </label>
            <input id="inputState" min="0" max="5" name="rating" placeholder="Ratting" type="number" class="form-control" />
          </div>
          <div class="form-group findworkergroup">
            <label>Ammount to be paid </label>
            <input id="inputState" name="totalpay" value="<?php echo ($offer->cost * $offer->duration); ?>" placeholder="Experiance" type="text" class="form-control" />
          </div>
          <div class="form-group findworkergroup">
            <label>Enter job experiance ( years ) </label>
            <textarea rows="3" id="inputState" name="comment" placeholder="Comment" type="text" class="form-control"></textarea>
          </div>

          <button type="submit" name="ratework" class="btn btn-primary btn-block findworkergroup">Complete and rate</button>
        </form>
    <?php }
}else{
// <p>You have no job offers</p>
}
  ?>
  <!-- </div> -->
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
  <div class="col-md-12 sunken">
    <div class="row flexbox-container">

            <?php
            $stmt = $auth_user->runQuery("SELECT * FROM services 
             LEFT JOIN offers 
              ON `offers`.`services_id`=`services`.`services_id`
              LEFT JOIN users 
              ON `users`.`public_id`=`offers`.`public_id`
              LEFT JOIN profile 
              ON `profile`.`public_id`=`users`.`public_id`
              WHERE status=0 AND `offers`.`worker_id`='$public_id'
               ");
            $stmt->execute(array());
            $services=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($services as $service) { ?>
            <div class="card col-md-2" style="float:left; margin:25px">
              <div style="margin: 5px; width:100%;">
                  <div class="sunken">
                    <center>
                        <img src="<?php echo $service->profileimage; ?>" alt="image" style="width:100px;height: 100px;border-radius: 50%;border: 2px solid #ff4700;" /><br /><br />
                        <?php echo $service->first_name; ?> <?php echo $service->middle_name; ?> <?php echo $service->last_name; ?><br />
                        <?php echo $service->country; ?> - <?php echo $service->town; ?><br />
                        <?php echo $service->phonenumber; ?><br />   
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $service->phonenumber; ?>" style="color:green;font-size: 25px;text-decoration: none;"  class="fa fa-whatsapp"></a> 
                    </center>
                  </div>         
                </div>

            </div>   

            <?php } ?>        

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>