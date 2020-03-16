<?php 
$title = "User payements";
// $description = "this is a user description";

 ?>
<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php if ($userRow['admin'] != 1) { 
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

<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.5/xlsx.full.min.js"></script>
<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

                             
<div class="col-md-12 sunken">

    <div class="card row  table-responsive" style="margin:10px;">
  <center><strong>My payements reports</strong></center>
      <div style="margin: 5px;max-width: 100%;">
          <div class="sunken " id="mytable">
             <div class="row" style="height:130px !important">
        <div class="card col-md-2" style="float:left; margin:25px">            
            <p><strong>Premium Users</strong></p>
            <center>
             <?php
                  $stmt = $auth_user->runQuery("SELECT * FROM users 
                 LEFT JOIN profile ON `profile`.`public_id`=`users`.`public_id` WHERE premium=1");
                  $stmt->execute(array());
                  $number_of_rows = $stmt->rowCount(); 
                 echo $number_of_rows;
   ?>
 </center>
</div>
 <div class="card col-md-2" style="float:left; margin:25px">            
            <p><strong>Non Premium Users</strong></p>
            <center>
             <?php
                  $stmt = $auth_user->runQuery("SELECT * FROM users 
                 LEFT JOIN profile ON `profile`.`public_id`=`users`.`public_id` WHERE premium=0");
                  $stmt->execute(array());
                  $number_of_rows = $stmt->rowCount(); 
                 echo $number_of_rows;
   ?>
 </center>
</div>
                 
   </div> 

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
<th>Image</th>
<th>Username</th>
<th>F name</th>
<th>M name</th>
<th>L name</th>
<th>user_email</th>
<th>transaction_tracking_id</th>
<th>reference</th>
<th>reg_date</th>
<th>Premium</th>
<th>Null</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stmt = $auth_user->runQuery("SELECT * FROM users 
      LEFT JOIN profile ON `profile`.`public_id`=`users`.`public_id` ");
    $stmt->execute(array());
    $users=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $user) { ?>
    <tr>
<td><img src="<?php echo $user->profileimage; ?>" style="height:50px;"></td>
<td><?php echo $user->user_name; ?></td>
<td><?php echo $user->first_name; ?></td>
<td><?php echo $user->middle_name; ?></td>
<td><?php echo $user->last_name; ?></td>
<td><?php echo $user->user_email; ?></td>
<td><?php echo $user->pesapal_transaction_tracking_id; ?></td>
<td><?php echo $user->pesapal_merchant_reference; ?></td>
<td><?php echo $user->reg_date; ?></td>


<td>
  <?php 
if ($user->premium ==0) { ?>
  <button type="button" class="btn btn-secondary btn-sm" style="width: inherit;">Not prmium</button>
<?php }else{ ?>
<button type="button" class="btn btn-success btn-sm createservice" style="width: inherit; border:none !important;">Premium account</button>
<?php }
 ?>
</td>

<td>
</td>

   
    </tr>
    <?php } ?>    

  </tbody>
</table>


          </div>
        </div>

    </div>      


</div>

</div>



<?php //require_once 'navigation/bottom.php'; ?>