
<title>div print</title>
</head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container " id="mainC">
<div class="modal show" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<body>
<div id="div_print">
<h1 style="Color:Red">The Div content which you want to print</h1>
<div class="myDiv">
<?php echo $userRow['user_name']; ?><br />
<?php echo $userRow['user_name']; ?><br />
Tracking ID: <?php echo $pesapal_transaction_tracking_id; ?><br />
Payment ref: <?php echo $pesapal_merchant_reference; ?>
</div>
</div>
</body>
</div>
<div class="modal-footer">
<script type="text/javascript">
function myFunction() {
var x = document.getElementById("mainC");
if (x.style.display === "none") {
x.style.display = "block";
} else {
x.style.display = "none";
}
}
</script>
<button onclick="myFunction()">Click Me</button>
<button type="button" class="btn btn-default" data-dismiss="modal" onClick="printdiv('div_print');">PRINT</button>
</div>
</div>
</div>
</div>
</div>