<?php
include "dbconfig.php" ;
$clientid = $_SESSION['clientid'];
$yearkeep = $_SESSION['yearkeep'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS :: </title>
<style type="text/css">
<!--
.style1 {font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #000000;
}
.style2 {font-family: Calibri;
	font-size: 15px;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="left" cellpadding="3" cellspacing="3">
  <tr>
    <td width="932"><div align="center"><span class="style1">
      <?php $reportkeep = "PROFIT AND LOSS ACCOUNT"  ;
							echo $reportkeep  ;?>
    </span></div></td>
  </tr>
  <tr>
    <td width="932"><div align="center"></div></td>
  </tr>
  <tr>
    <td><span class="style2">
      <?php
      
include ('dbconfig.php');
 

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT credit,debit,transdate,transtime,paymenttype,narration,confirmby FROM profitloss WHERE clientid='$clientid' ";
$result = $conn->query($sql);
//==============
include "dbconfig.php" ;$sql1="SELECT * FROM profitloss WHERE clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
//====================
if ($result->num_rows > 0) {

echo "<table border = '1' width = '100%'><thead><tr><th>S/N</th><th>CREDIT</th><th>DEBIT</th><th>TRANS DATE</th><th>TRANS TIME</th><th>PAYMENT TYPE</th><th>NARRATION</th><th>TRANSDATE</th>CONFIRM BY</tr></thead>";
     // output data of each row
	 //$c=0;
	 $counter = 0 ;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
	
	  
         echo "<tr><td>" . ++$counter. "</td><td>" . $row["credit"]. "</td><td>" . $row["debit"]."</td><td>"  . $row["transdate"]. "</td><td>"  . $row["transtime"]. "</td><td>"  . $row["paymenttype"]. "</td><td>"  . $row["narration"]. "</td><td>"  . $row["confirmby"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
    </span></td>
  </tr>
  <tr>
    <td><span class="style1"></span></td>
  </tr>
</table>
</body>
</html>
