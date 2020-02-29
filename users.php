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


                             
<div class="col-md-12 sunken">

    <div class="card row  table-responsive" style="margin:10px;">
  <center><strong>My user reports</strong></center>
      <div style="margin: 5px;max-width: 100%;">
          <div class="sunken ">


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
<th>Username</th>
<th>F name</th>
<th>M name</th>
<th>L name</th>
<th>Account</th>
<th>reg_date</th>
<th>Image</th>
<th>worker_id</th>
<th>null</th>
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
<td><?php echo $user->user_name; ?></td>
<td><?php echo $user->first_name; ?></td>
<td><?php echo $user->middle_name; ?></td>
<td><?php echo $user->last_name; ?></td>
<td><?php echo $user->user_account; ?></td>
<var><td><?php echo $user->reg_date; ?></td></var>
<td><img src="<?php echo $user->profileimage; ?>" style="height:50px;"></td>

<td>
  <form method="post">
    <input type="text" hidden name="public_id" value="<?php echo $userRow['public_id']; ?>">
    <button type="submit" name="Deleteuser" class="btn  btn-sm"  style="width: inherit; background-color: #ff4700 !important;">Delete user</button>
  </form>
</td>

    <td></td>
    </tr>
    <?php } ?>    

  </tbody>
</table>


          </div>
        </div>

