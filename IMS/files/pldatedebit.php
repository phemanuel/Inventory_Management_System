
<?php
include "dbconfig.php" ; 
//$yearkeep = $_SESSION['yearkeep'];
$clientid = $_SESSION['clientid'];
$paymentstatuskeep = $_SESSION['paymentstatuskeep'];
$startdatekeep  = $_SESSION['startdate'];
$enddatekeep  = $_SESSION['enddate'];
$reportkeep = $startdatekeep . " - " . $enddatekeep ;
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
  <table width="60%" border="0" align="left" class="table table-bordered table-striped">
   <tr>
      <td colspan="2"><span class="style1">Profit and Loss Account (DEBIT) between <?php echo $reportkeep;?></span></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style1"><a href="placcountcsv3.php">Download CSV</a><span class="style6"> <span class="style7">| <a href="pldate.php">Menu</a><a href="placcount.php"></a></span></span></span></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="60%"><span class="style2">
        <?php
      
include ('dbconfig1.php');
$startdate = date("Y-m-d", strtotime($_SESSION['startdate']));  
$enddate = date("Y-m-d", strtotime($_SESSION['enddate'])); 


//========get sum of debit
$result5 = mysqli_query($conn,"SELECT SUM(debit) AS value_sum5 FROM profitloss WHERE transdate BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and clientid='$clientid' and paymenttype='$paymentstatuskeep'"); 
$row5 = mysqli_fetch_assoc($result5); 
$sum5 = $row5['value_sum5'];


//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT debit,transdate,transtime,paymenttype,narration,confirmby FROM profitloss WHERE  transdate BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and clientid='$clientid' and paymenttype='$paymentstatuskeep' order by transdate asc ";
$result = $conn->query($sql);
//==============
include "dbconfig1.php" ;
$sql1="SELECT * FROM profitloss WHERE  transdate BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and clientid='$clientid' and paymenttype='$paymentstatuskeep'";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
//====================
if ($result->num_rows > 0) {

echo "<table border = '1' width = '100%' class='table table-bordered table-striped'><thead><tr><th>S/N</th><th>DEBIT</th><th>TRANS DATE</th><th>TRANS TIME</th><th>PAYMENT TYPE</th><th>NARRATION</th><th>CONFIRM BY</th></tr></thead>";
     // output data of each row
	 //$c=0;
	 $counter = 0 ;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
	
	  
         echo "<tr><td>" . ++$counter. "</td><td>" . $row["debit"]."</td><td>"  . $row["transdate"]. "</td><td>"  . $row["transtime"]. "</td><td>"  . $row["paymenttype"]. "</td><td>"  . $row["narration"]. "</td><td>"  . $row["confirmby"]. "</td></tr>";
		 
	
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style13 style1"><strong><span class="style17">Total Debit : <?php echo $sum5 ;?></span></strong></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style5"><?php echo $count ;?>&nbsp; records</span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</div>
</div>
</body>
</html>
