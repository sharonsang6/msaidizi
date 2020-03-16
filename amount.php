<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row" style="width: 100% !important; height:300px !important">
<style type="text/css">
	.findworkergroup{
		width: 100%;
	}
</style>
<div class="col-md-3"></div>
<div class="col-md-6">
	<form method="post">
		<p style="margin-top: 20px;"><strong>Enter amount you paid (Ksh)</strong> <i>For validation purpose</i></p></br>
		<input class="form-control" required name="amount" type="number"></br>
		  <button type="submit" name="submitamount" class="btn btn-primary btn-block findworkergroup">Submit</button>
	</form>
</div>
<div class="col-md-3"></div>

</div> 

<?php require_once 'navigation/bottom.php'; ?>