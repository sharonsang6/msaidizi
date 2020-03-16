<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once 'api/includer.php'; ?>
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


  <div class="col-md-3 card">
  <p style="margin-top:20px">Filter your search by specifying the type of worker you need</p>
  <?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
   $stmt = $auth_user->runQuery("SELECT * FROM offers 
    LEFT JOIN services ON `services`.`services_id`=`offers`.`services_id`
    WHERE offers_id='$id' ");
    $stmt->execute(array());
    $offers=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($offers as $offer) { ?>
          <form method="post" enctype="multipart/form-data" >
          
          <div class="form-group findworkergroup">
            <input id="inputState" hidden name="worker_id" placeholder="Experiance" type="text" class="form-control" value="<?php echo $offer->worker_id; ?>" />
            <input id="inputState"  name="offers_id" placeholder="Experiance" type="text" class="form-control" value="<?php echo $offer->offers_id; ?>" />
            <input id="inputState" hidden name="worker_id" placeholder="Experiance" type="text" class="form-control" value="<?php echo $offer->worker_id; ?>" />

          </div>
          <div class="form-group findworkergroup">
            <label>Rate work </label>
            <input id="inputState" min="0" max="5" name="rating" placeholder="Ratting" type="number" class="form-control" />
          </div>
          <div class="form-group findworkergroup">
            <label>Ammount to be paid </label>
            <input id="inputState" name="totalpay" value="<?php echo ($offer->cost * $offer->duration); ?>" placeholder="Experiance" type="number" class="form-control" />
          </div>
          <div class="form-group findworkergroup">
            <label>Enter job experiance  </label>
            <textarea rows="3" id="inputState" name="comment" placeholder="Comment" type="text" class="form-control"></textarea>
          </div>
          <button type="submit" name="ratework" class="btn btn-primary btn-block findworkergroup">Complete and rate</button>
        </form>
    <?php }
}else{

}
  ?>
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
    <div class="rows flexbox-container row">
<?php
$stmt = $auth_user->runQuery("SELECT *  FROM  offers
  LEFT JOIN services 
  ON `services`.`public_id`=`offers`.`public_id`
  WHERE `offers`.`public_id`='$public_id' AND `status`=0 ORDER BY `offers_reg_date` DESC
");
$stmt->execute(array());
$offers=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($offers as $offer) { ?>


    <?php
    $stmt = $auth_user->runQuery("SELECT *  FROM  users 
              LEFT JOIN profile 
              ON `users`.`public_id`=`profile`.`public_id`
              WHERE `profile`.`public_id`='".$offer->worker_id."'
    ");
    $stmt->execute(array());
    $users=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $user) { ?>
            <div class="card col-md-3" style="width: 100%;float:left;margin: 0.5%;">
              <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
                  <div class="sunken">
                    <center>
                              <img src="<?php echo $user->profileimage; ?>" alt="image" style="width:100px;height: 100px;border-radius: 50%;border: 10px solid #f0f6f9;" /><br /><br />
                            <?php echo $user->first_name; ?> <?php echo $user->middle_name; ?> <?php echo $user->last_name; ?><br />
                            <?php echo $user->country; ?> - <?php echo $user->town; ?><br />
                            <?php echo $user->phonenumber; ?><br />    
                    </center>
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?php echo $offer->typeofworker; ?></h5>
                      <small class="text-muted"><?php echo $offer->job; ?></small>
                    </div>
                    Work experience: <?php echo $offer->experience; ?> year(s)
                    <?php echo $offer->description; ?><br />
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1" style="color: gold;font-weight: bold;margin-left: 20px;"><?php echo $user->user_name; ?> - <?php echo $user->allrating; ?></h5>
                      <small class="text-muted">Ksh <?php echo $offer->cost; ?> per day</small>
                    </div>
                  </div>         
                </div>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="width: 100%;">
                    <a href="hiredworkers.php?id=<?php echo $offer->offers_id; ?>">
                      <button type="button" class="btn " style="width: inherit; background-color:#ff4700" >Click to rate and make payment</button>
                    </a>
                  </div>  

            </div>   

    <?php } ?> 


<?php } ?>        

    </div>
  </div>
 

</div>



<?php require_once 'navigation/bottom.php'; ?>