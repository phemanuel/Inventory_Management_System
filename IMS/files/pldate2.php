
<?php
include "dbconfig.php" ;

$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];



if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

}  
$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];
$_SESSION['startdate'] = $startdate;
$_SESSION['enddate'] = $enddate;
//$yearkeep = $_SESSION['yearkeep'];
$clientid = $_SESSION['clientid'];
$paymentstatuskeep = $_SESSION['paymentstatuskeep'];


if ($paymentstatuskeep == "ALL") {
echo "<script>

window.location.href='pldateall.php';
</script>";
}
else if ($paymentstatuskeep == "Credit") {
echo "<script>

window.location.href='pldatecredit.php';
</script>";
}
else if ($paymentstatuskeep == "Debit") {
echo "<script>

window.location.href='pldatedebit.php';
</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
.style1 {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
<!--
.style2 {font-family: Calibri;
	font-size: 15px;
}
.style5 {font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #000000;
}
.style6 {color: #FF0000}
.style7 {color: #000000}
.style11 {
	font-family: Calibri;
	font-size: 13px;
	font-weight: bold;
}
.style13 {font-size: 14px}
.style17 {font-size: 13px}
-->
</style>
</head>

<body>
<div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
<form id="form1" name="form1" method="post" action="">
</form>
</div>
</div>
</body>
</html>
