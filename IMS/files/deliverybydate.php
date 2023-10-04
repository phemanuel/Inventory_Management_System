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

$startdate = $_SESSION['startdate'];
$enddate = $_SESSION['enddate'];

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
.style11 {
	font-family: Calibri;
	font-size: 16px;
}
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
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#startdate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
    <script>
	$(document).ready(function(){
		$('#enddate').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
	</script>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="paymentcheck.php">
  <table width="100%" border="0">
    <tr>
      <td width="550"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i><?php echo "Delivery Report" . " between " . $startdate  . " to " . $enddate; ?></h4>
        </div>
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="style1 style11"><a href="delivery_csv1.php">Download CSV</a> | <a href="delivery.php">Menu</a></span></h4>
        </div>
         <div class="modal-body">
         <?php
$startdate = date("Y-m-d", strtotime($_SESSION['startdate']));  
$enddate = date("Y-m-d", strtotime($_SESSION['enddate'])); 

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT customer_name,mobile_no,item_name,pickup_location,delivery_location,price,payment_mode,pickup_time
,delivery_time,date1,confirm_by FROM delivery WHERE  date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid'  order by date1 DESC";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM delivery WHERE  date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
$_SESSION['totalquantity'] = $count ;
//$_SESSION['totalrecord'] = $count ;
//====================get total amount---------

$result5 = mysqli_query($conn,"SELECT SUM(price) AS value_sum FROM delivery WHERE date1 BETWEEN '" . $startdate . "' AND  '" . $enddate . "' and  clientid='$clientid'"); 
$row1 = mysqli_fetch_assoc($result5); 
$sum = $row1['value_sum'];
$_SESSION['totalamount']  = $sum ;
//$finalamount = $sum ;
//$_SESSION['finalamount']  = $sum ;


//-------------------
if ($result5->num_rows > 0) {


  echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>CUSTOMER NAME</th><th>ITEM NAME</th>
  <th>AMOUNT</th><th>PICK-UP</th><th>DELIVERY</th><th>DATE</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
   echo "<tr><td>" . ++$c. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["item_name"]. "</td><td>"  
   . $row["price"]. "</td><td>"  . $row["pickup_location"]. "</td><td>"  . $row["delivery_location"]. "</td><td>"  . $row["date1"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
         </div>
         <div class="modal-body"><p align = "left"><strong>Total Amount:</strong>  <?php echo $sum ; ?>&nbsp;</p></div>
                <div class="modal-footer">
          
          <input name="button" type="submit" id="button4"  class="btn btn-info" onclick="MM_goToURL('parent','delivery.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      
      
      <td width="37">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
