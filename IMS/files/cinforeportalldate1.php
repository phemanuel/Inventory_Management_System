<?php
include ("dbconfig.php");

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

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;


$datekeep = date('Y-m-d');
$datekeep1 = date("jS F, Y", strtotime($datekeep));
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
<!--
.style5 {
	font-size: 12px;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.style6 {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
.style7 {
	font-size: 12px;
	width: 100%;
	height: 38px;
	padding: 8px 12px;
	line-height: 1.42857143;
	color: #555555;
	background-color: #ffffff;
	background-image: none;
	border: 1px solid #cccccc;
	display: block;
}
.style8 {font-size: 12px}
.style10 {font-size: 12px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: bold; }
-->
</style>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="#">
  <table width="100%" border="0">
    <tr>
      <td width="550"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i><?php echo $transname ." Report Analysis" . " between " . $startdate  . " to " . $enddate; ?></h4>
        </div>
         <div class="modal-body">
         <?php
$startdate = date("Y-m-d", strtotime($_SESSION['startdate']));  
$enddate = date("Y-m-d", strtotime($_SESSION['enddate'])); 

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT product_id,customername,mobileno,iucno,cablename,cableplan,costprice,sellprice,profit,date1,confirmby FROM cabletv WHERE  date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid'  order by date1 DESC";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM cabletv WHERE   date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
$_SESSION['totalquantity'] = $count ;
//$_SESSION['totalrecord'] = $count ;
//====================get total amount---------

$result5 = mysqli_query($conn,"SELECT SUM(sellprice) AS value_sum FROM cabletv WHERE date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid'"); 
$row1 = mysqli_fetch_assoc($result5); 
$sum = $row1['value_sum'];
$_SESSION['totalamount']  = $sum ;
//$finalamount = $sum ;
//$_SESSION['finalamount']  = $sum ;

//----------------get total profit-----------------
$result7 = mysqli_query($conn,"SELECT SUM(profit) AS value_sum1 FROM cabletv WHERE date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid'"); 
$row7 = mysqli_fetch_assoc($result7); 
$sum7 = $row7['value_sum1'];
$_SESSION['totalprofit']  = $sum7 ;
//-------------------
if ($result5->num_rows > 0) {


echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>CUSTOMER NAME</th><th>MOBILE NO</th><th>IUC NO</th><th>CABLE NAME</th><th>CABLE PLAN</th><th>COST PRICE</th><th>SELL PRICE</th><th>PROFIT</th><th>CONFIRM BY</th><th>DATE</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
          echo "<tr><td>" . ++$c. "</td><td>" . $row["customername"]. "</td><td>" . $row["mobileno"]. "</td><td>" . $row["iucno"]. "</td><td>" . $row["cablename"]. "</td><td>" . $row["cableplan"]. "</td><td>" . $row["costprice"]. "</td><td>" . $row["sellprice"]. "</td><td>" . $row["profit"]. "</td><td>" . $row["confirmby"]. "</td><td>" . $row["date1"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
         </div>
                <div class="modal-body"><div class="form-group">
          <table width="50%" border="0" cellpadding="4" cellspacing="4" class='table table-bordered table-striped'>
              <tr>
                <td width="34%"><strong>Total Amount Sold</strong></td>
                <td width="66%"><span class="style5 style8"><?php echo $sum; ?></span></td>
              </tr>
              <tr>
                <td><strong>Profit</strong></td>
                <td><span class="style5 style8"><?php echo $sum7; ?></span></td>
              </tr>
            </table>
            <label></label>
          </div>
          </div>
        <div class="modal-footer">
          
          <input name="button" type="submit" id="button4"  class="btn btn-info" onclick="MM_goToURL('parent','cinforeport.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="37">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
