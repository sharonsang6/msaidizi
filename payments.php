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
  <center>My user reports</center>
      <div style="margin: 5px;max-width: 100%;">
          <div class="sunken " id="mytable">

<table class="table table-bordered" style="width: 100%;">
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
  <button type="button" class="btn btn-success btn-sm" style="width: inherit;">Not prmium</button>
<?php }else{ ?>
<button type="button" class="btn btn-success btn-sm createservice" style="width: inherit;">Premium account</button>
<?php }
 ?>
</td>

<td>
</td>

    <td></td>
    </tr>
    <?php } ?>    

  </tbody>
</table>


          </div>
        </div>

    <button id="button-a">Create Excel report</button>
<script>
        var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
        function s2ab(s) {
                        var buf = new ArrayBuffer(s.length);
                        var view = new Uint8Array(buf);
                        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                        return buf;
        }
        $("#button-a").click(function(){
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'report.xlsx');
        });
</script>

    </div>      


</div>

</div>



<?php require_once 'navigation/bottom.php'; ?>