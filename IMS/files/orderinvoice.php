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
<link rel="stylesheet" href="style.css">
<style type="text/css">
<!--
.style5 {font-size: 12px}
.style6 {
	font-size: 12px;
	font-weight: bold;
	font-style: italic;
}
.style7 {font-size: 12px; font-weight: bold; }
.style8 {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
.style9 {font-size: 12px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
.style11 {font-size: 12px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: bold; }
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
<script type="text/javascript">
  
function myFunction()
{
    window.print();
}
@media print
{
  .button
  {
    display: none;
  }
}

</script>
</head>

<body>
<div class="panel-body">
<div class="row"></div>
<form method="post" id="product_form" action="">
  <table width="35%" border="0">
    <tr>
      <td width="272"><div class="modal-content">
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
$sql = "SELECT rid,itembarcode,itemname,itemquantity,amount,itemprice,itemim FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid'  order by itemname ASC";
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


echo "<table class='table table-bordered table-striped'><thead></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . $row["itemname"]. " - " .$row["itemquantity"]."</td></tr>";
		 echo "<tr><td>" . $row["amount"]. "</td></tr>";
	
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
                <td width="50%"><span class="style11">Total Due</span></td>
                <td width="50%"><span class="form-group style8 style5"><?php echo $totalamount; ?></span></td>
              </tr>
              <tr>
                <td height="28"><span class="style11">Payment Mode</span></td>
                <td><span class="form-group style8 style5"><?php echo $paymentmode; ?></span></td>
              </tr>
              <tr>
                <td><span class="style11">Discount</span></td>
                <td><span class="form-group style8 style5"><?php echo $discount; ?></span></td>
              </tr>
              <tr>
                <td><span class="style11">Amount to Pay</span></td>
                <td><span class="form-group style8 style5"><?php echo $finalamount; ?></span></td>
              </tr>              
              <tr>
                <td><span class="style11">Status</span></td>
                <td><span class="form-group style8 style5"><?php echo $status; ?></span></td>
              </tr>
            </table>
            <label></label>
          </div>
            <div class="form-group style5">
            <label>Cashier :</label>
            <span class="form-group style8 style5"><?php echo $cashier; ?></span></div>
            <div class="form-group style5">
            <label>Trans ID :</label>
            <span class="modal-title"><?php echo $supplyid ; ?></span></div>
            <div class="form-group style5">
            <label>Date :</label>
            <span class="modal-title"><?php echo $datekeep ; ?></span></div>
            <div class="form-group style5">
            <label>
            <div align="center" class="style12">Goods bought in good condition cannot be returned.</div>
            </label>
            <div align="center"><span class="modal-title"></span></div>
            </div>
            <div class="form-group">
              <p class="style7">&nbsp;</p>
              <div align="center" class="style6">Thanks for your patronage...</div>
                 </label>
               </div>
        </div>
    
        <div class="modal-footer">
          <input name="button" type="submit" id="btnPrint" class="hidden-print"  value="Print" />
          <input name="button1" type="submit" id="button1"  class="hidden-print" onclick="MM_goToURL('parent','../dashboardcheck.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="97">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<script src="script.js"></script>