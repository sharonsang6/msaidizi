<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
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
<div class="row" style="width: 100% !important;">
<style type="text/css">
  .findworkergroup{
    width: 100%;
  }
</style>


                             
<div class="col-md-12 sunken">

    <div class="card row" style="margin:10px;">
  <center><strong>Workers who have been hired</strong></center>
      <div class="modal-dialog" style="margin: 5px;max-width: 100%;">
         <div class="card col-md-2" style="float:left; margin:25px">            
            <p><strong>Workers in progress</strong></p>
            <center>
             <?php
                  $stmt = $auth_user->runQuery("SELECT * FROM offers 
                  LEFT JOIN profile ON `profile`.`public_id`=`offers`.`public_id` WHERE `status`=0 ");
                  $stmt->execute(array());
                  $number_of_rows = $stmt->rowCount(); 
                 echo $number_of_rows;
   ?>
 </center>


                 
   </div> 
    <div class="card col-md-2" style="float:left; margin:25px">            
            <p><strong>Workers who've completed jobs</strong></p>
            <center>
             <?php
                  $stmt = $auth_user->runQuery("SELECT * FROM offers 
                  LEFT JOIN profile ON `profile`.`public_id`=`offers`.`public_id` WHERE `status`=1 ");
                  $stmt->execute(array());
                  $number_of_rows = $stmt->rowCount(); 
                 echo $number_of_rows;
   ?>
 </center>


                 
   </div> 
          <div>

<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css
" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/8.0.0/highcharts.min.js" integrity="sha256-r4cOuAPNm8D8kkaCdUJe58iLHTzuQzTwPYvcMn1inxc=" crossorigin="anonymous"></script>
<script src="customjs.js"></script>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
<th>Worker</th>
<th>typeofworker</th>
<th>job</th>
<th>town</th>
<th>worker_id</th>
<th>start_date</th>
<th>duration</th>
<th>rating</th>
<th>totalpay</th>
<th>status</th>
<th>offers_reg_date</th>
<th>null</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $stmt = $auth_user->runQuery("SELECT * FROM offers 
      LEFT JOIN services ON `services`.`services_id`=`offers`.`services_id`
      LEFT JOIN users ON `users`.`public_id`=`offers`.`worker_id`
      WHERE `offers`.`public_id`='$public_id' ORDER BY `offers_reg_date`");
    $stmt->execute(array());
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($services as $service) { ?>          
            <tr>
<td><?php echo $service->user_name; ?></td>
<td><?php echo $service->typeofworker; ?></td>
<td><?php echo $service->job; ?></td>
<td><?php echo $service->town; ?></td>
<td><?php echo $service->worker_id; ?></td>
<td><?php echo $service->start_date; ?></td>
<td><?php echo $service->duration; ?></td>
<td><?php echo $service->rating; ?> stars</td>
<td><?php echo $service->totalpay; ?></td>
<td><?php 
if($service->status==1){
  echo "completed";
}
elseif($service->status==0){
  echo "in progress";
}

 ?></td>
<td><?php echo $service->offers_reg_date; ?></td>
<td></td>
            </tr>
  <?php } ?>

        </tbody>
        <tfoot>
            <tr>
<th>Worker</th>
<th>typeofworker</th>
<th>job</th>
<th>town</th>
<th>worker_id</th>
<th>start_date</th>
<th>duration</th>
<th>rating</th>
<th>totalpay</th>

<th>offers_reg_date</th>
<th>null</th>
            </tr>
        </tfoot>
    </table>
          </div>
        </div>

    </div>      


</div>

</div>



<?php //require_once 'navigation/bottom.php'; ?>