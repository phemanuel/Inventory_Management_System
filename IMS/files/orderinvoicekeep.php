<?php
include ("dbconfig.php");

$clientid = $_SESSION['clientid'];

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='../logout.php';
</script>";
}
else {

} 

$supplyid = $_GET['id'];
$user_name = $_SESSION['user_name'];

//==============
$sql="SELECT * FROM supply1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {
 $supplyid= $rowval['supplyid'];
  //$totalquantity= $rowval['totalquantity'];
   $totalamount= $rowval['totalamount'];
    $itemsupplier= $rowval['itemsupplier'];
	  $paymentmode= $rowval['paymentmode'];
	  $status= $rowval['status'];
	   $discount= $rowval['discount'];
	    $finalamount= $rowval['finalamount'];
		 $cashier = $rowval['confirmby']; 
	 $date1 = $rowval['supplydate']; 
	 
$datekeep = date("jS F, Y", strtotime($date1));
}

}


//=============

$clientlogo = $_SESSION['clientlogo'];
$clientemail = $_SESSION['clientemail'];
$clientmobileno = $_SESSION['clientmobileno'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS :: Invoice</title>
<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
<!--
.style5 {font-size: 12px}
.style6 {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
.style11 {font-weight: bold}
.style12 {
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style13 {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 12px; }
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
<form method="post" id="product_form" action="additem.php">
  <table width="35%" border="0">
    <tr>
      <td width="305"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 align="center" class="modal-title"><i class="fa fa-plus"></i> <img name="" src="../../apps/uploads/<?php echo $clientlogo ; ?>" width="125" height="110" alt="" /></h4>
          <p align="center" class="modal-title"><?php echo $clientemail ; ?>&nbsp;</p>
          <p align="center" class="modal-title"><?php echo $clientmobileno ; ?>&nbsp;</p>
          <h4 class="modal-title">&nbsp;</h4>
          </div>
         <div class="modal-body">
         <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT rid,itembarcode,itemname,itemquantity,amount,itemprice FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid'  order by itemname ASC";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
//$_SESSION['totalrecord'] = $count ;
//====================

$result5 = mysqli_query($conn,"SELECT SUM(amount) AS value_sum FROM supply WHERE supplyid='$supplyid' and clientid='$clientid' "); 
$row1 = mysqli_fetch_assoc($result5); 
$sum = $row1['value_sum'];
if ($result5->num_rows > 0) {


echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>ITEM NAME</th><th>QUANTITY</th><th>RATE</th><th>AMOUNT</th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["itemname"]. "</td><td>" . $row["itemquantity"]. "</td><td>" . $row["itemprice"]. "</td><td>"  . $row["amount"]. "</td></tr>";
		 
	
     }
	
     echo "</table>";
	
} else {
     echo "0 results";
}
?>
         </div>
        <div class="modal-body">
          <div class="form-group">
            <table width="50%" border="0" cellpadding="4" cellspacing="4" class='table table-bordered table-striped'>
              <tr>
                <td width="50%"><span class="style5 style6 style11"><strong>Total Due</strong></span></td>
                <td width="50%"><span class="style5 style6 form-group"><strong><?php echo $totalamount; ?></strong></span></td>
              </tr>
              <tr>
                <td height="28"><span class="style5 style6 style11"><strong>Payment Mode</strong></span></td>
                <td><span class="style5 style6 form-group"><strong><?php echo $paymentmode; ?></strong></span></td>
              </tr>
              <tr>
                <td><span class="style5 style6"><strong>Discount</strong></span></td>
                <td><span class="style5 style6 form-group"><strong><?php echo $discount; ?></strong></span></td>
              </tr>
              <tr>
                <td><span class="style5 style6"><strong>Amount to Pay</strong></span></td>
                <td><span class="style5 style6 form-group"><strong><?php echo $finalamount; ?></strong></span></td>
              </tr>
              <tr>
                <td><span class="style5 style6"><strong>Tendered</strong></span></td>
                <td><span class="style5 style6"><strong><?php echo $finalamount; ?></strong></span></td>
              </tr>
              <tr>
                <td><span class="style5 style6"><strong>Customer Name</strong></span></td>
                <td><span class="style5 style6 form-group"><strong><?php echo $itemsupplier; ?></strong></span></td>
              </tr>
              <tr>
                <td><span class="style5 style6"><strong>Status</strong></span></td>
                <td><span class="style5 style6 form-group"><strong><?php echo $status; ?></strong></span></td>
              </tr>
            </table>
            <label></label>
          </div>
            <div class="form-group style5">
            <label><span class="style13">Cashier :</span></label>
            <span class="style6 form-group style5"><strong><?php echo $cashier; ?></strong></span></div>
            <div class="form-group style6 style5">
            <label>Trans ID :</label>
            <span class="modal-title"><?php echo $supplyid ; ?></span></div>
            <div class="form-group style6 style5">
            <label>Date :</label>
            <span class="modal-title"><?php echo $datekeep ; ?></span></div>
            <div class="form-group">
              <p class="style12">&nbsp;</p>
              <div align="center" class="style12">Thanks for your patronage...</div>
                 </label>
            </div>
        </div>
    
        <div class="modal-footer">
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','orderuser.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="58">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
