
<?php
include "dbconfig.php" ; 
$deptkeep = $_SESSION['dept'];
$clientid = $_SESSION['clientid'];

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
-->
</style>
</head>

<body>
<div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
<form id="form1" name="form1" method="post" action="">
  <table width="60%" border="0" align="left" class="table table-bordered table-striped">
    <tr>
      <td colspan="2"><span class="style1"><a href="purchasecsv1.php">Download CSV</a> for purchase made by <span class="style6"><?php echo $deptkeep;  ?> <span class="style7">| <a href="purchase.php">Menu</a></span></span></span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="60%"><span class="style2">
        <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT itemname,itemsupplier,itemquantity,itemunit,amount,purchasedate,paymentmode FROM purchase WHERE  dept='$deptkeep' and clientid='$clientid'  order by purchasedate ASC";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM purchase WHERE  dept='$deptkeep' and clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
$_SESSION['totalrecord'] = $count ;
//====================
if ($result->num_rows > 0) {


echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>ITEM NAME</th><th>SUPPLIED BY</th><th>QUANTITY</th><th>AMOUNT</th><th>DATE PURCHASED</th><th>PAYMENT MODE</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["itemname"]. "</td><td>" . $row["itemsupplier"]. "</td><td>" . $row["itemquantity"]. " ". $row["itemunit"]."</td><td>"  . $row["amount"]. "</td><td>"  . $row["purchasedate"]. "</td><td>"  . $row["paymentmode"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
      </span></td>
      <td width="40%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><span class="style5"><?php echo $count ;?>&nbsp; records</span></td>
    </tr>
  </table>
</form>
</div>
</div>
</body>
</html>
