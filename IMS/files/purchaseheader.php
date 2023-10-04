<?php
//include('database_connection.php');

$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$supplyid = $_SESSION['supplyid'];
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IMS :: <?php echo $clientid ?></title>
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">PURCHASE</h2>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="../dashboardcheck.php" class="navbar-brand">Menu</a>
					</div>
					<ul class="nav navbar-nav">
					<li><a href="purchaseid.php">New Purchase </a></li>
						<li><a href="purchasecsv.php">Report Analysis </a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $clientname1; ?></a>
							
						</li>
					</ul>

				</div>
			</nav>
			