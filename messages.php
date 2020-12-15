<?php 
$title = "Messages report";
// $description = "this is a user description";

 ?>
<?php require_once 'header/header.php'; ?>
<?php //require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php if ($userRow['admin'] != 1) { 
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

/*.flexbox-container > div {
  padding: 10px;
}

.flexbox-container > div:first-child {
  margin-right: 20px;
}*/
</style>
<?php
$connect=mysqli_connect("localhost","root", "","msaidizi");
$query="SELECT * FROM messages ORDER BY `sent_date` DESC";
$result=mysqli_query($connect, $query);
?>
                            
 <div class="col-md-12 sunken">

<div class="card row  table-responsive" style="margin:10px;">
<center><strong>Feedback from clients</strong></center>
         <div style="margin: 5px;max-width: 100%;">
      <div class="sunken ">
      
       <div class="card col-md-2 summaryreport" style="float:left; margin:25px">         
          <p><strong>All Messages</strong></p>
            <center>
             <?php
                  $stmt = $auth_user->runQuery("SELECT * FROM messages");
                  $stmt->execute(array());
                  $number_of_rows = $stmt->rowCount(); 
                 echo $number_of_rows;
   ?>
 </center>

                 
   </div> 
              
   </div> 

     <div id="content">

    

     


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
<th class="removablehead">Name</th>
<th>Email</th>
<th>Subject</th>
<th>Sent Date</th>
<th>Message</th>
<th>Null</th>
</tr>
</thead>
<tbody>
<?php

while ($users= mysqli_fetch_array($result)) { ?>
 <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <strong>Message Description</strong>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                    $stmt = $auth_user->runQuery("SELECT * FROM  messages WHERE `message_id`='".$users['message_id']."'");
                    $stmt->execute(array());
                    $messagedescr=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($messagedescr as $onemessage) { ?>
                        <center>
                        <?php echo $users["message_id"]; ?>
                      <?php echo $onemessage->message; ?><br />
                            </center>
                    <?php } ?>
                  </div>
                  <div class="modal-footer">
                  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
<?php echo'

<tr>
<td class="removablehead">'.$users["name"].'</td>
<td>'.$users["email"].'</td>
<td>'.$users["subject"].'</td>
<td>'.$users["sent_date"].'</td>
<td>
<form method="post">
<input type="text"  name="message_id" hidden value='.$users["message_id"].'>
<button type="button" class="btn btn-secondary" style="width: inherit;"  data-toggle="modal" data-target="#message">View </button>
<button type="submit" name="deletemessage" class="btn" style="background-color:#ff4700 !important" btn-success btn-sm" style="width: inherit;">Delete</button>
</form>

</td>
<td></td>
</tr>';
 } ?>    

</tbody>
</table>



                  
               

    </div>
  </div>
 

</div>


      </div>
    </div>


</div>      


</div>

</div>



<?php //require_once 'navigation/bottom.php'; ?>
 