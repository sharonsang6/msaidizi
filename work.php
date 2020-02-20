<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

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
	<center>My service reports</center>
		  <div class="modal-dialog" style="margin: 5px;max-width: fit-content;">
		    	<div class="sunken " id="mytable">

<table class="table table-bordered">
  <thead>
    <tr>
<th>job</th>
<th>town</th>
<th>cost</th>
<!-- <th>worker_id</th> -->
<th>start_date</th>
<th>duration</th>
<th>rating</th>
<th>totalpay</th>
<th>status</th>
<th>offers_reg_date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stmt = $auth_user->runQuery("SELECT * FROM offers 
    	LEFT JOIN services ON `services`.`public_id`=`offers`.`public_id`
    	WHERE worker_id='$public_id' ");
    $stmt->execute(array());
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($services as $service) { ?>
	  <tr>
<td><?php echo $service->job; ?></td>
<td><?php echo $service->town; ?></td>
<td><?php echo $service->cost; ?></td>
<!-- <td><?php echo $service->worker_id; ?></td> -->
<td><?php echo $service->start_date; ?></td>
<td><?php echo $service->duration; ?></td>
<td><?php echo $service->rating; ?> stars</td>
<td><?php echo $service->totalpay; ?></td>
<td><?php if ($service->status == "1") { ?>
<button type="button" class="btn btn-success btn-sm" style="width: inherit;">COMPLETED</button>
<?php }else{ ?>
<button type="button" class="btn btn-primary btn-sm" style="width: inherit;">IN PROGRESS</button>
<?php }; ?></td>
<td><?php echo $service->offers_reg_date; ?></td>

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