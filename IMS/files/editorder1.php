<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$itemid = $_SESSION['supplyid'];
$sql="SELECT * FROM supply1 WHERE supplyid='$itemid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {
 $supplyid= $rowval['supplyid'];
  $totalquantity= $rowval['totalquantity'];
   $totalamount= $rowval['totalamount'];
    $itemsupplier= $rowval['itemsupplier'];
	  $paymentmode= $rowval['paymentmode'];
	  $paymentstatus= $rowval['status'];
	  $comment= $rowval['comment'];
	  $mobileno= $rowval['mobileno'];
	  $discount= $rowval['discount'];
 $supplydate= $rowval['supplydate'];
//$picnamekeep= $rowval['picturename'];


}
$_SESSION['supplyid'] = $supplyid;
$_SESSION['totalquantity'] = $totalquantity;
$_SESSION['totalamount'] = $totalamount;
$_SESSION['itemsupplier'] = $itemsupplier;
$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['paymentstatus'] = $paymentstatus;
$_SESSION['comment'] = $comment;
$_SESSION['mobileno'] = $mobileno;
$_SESSION['discount'] = $discount;
$_SESSION['supplydate'] = $supplydate;
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS :: edit Order</title>
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
.style6 {
	color: #FF0000;
	font-weight: bold;
}
.style10 {font-size: 12px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight: bold; }
.style11 {	font-size: 12px;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.style12 {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
.style7 {	font-size: 12px;
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
<form method="post" id="product_form" action="confirmorder.php">
  <table width="597" border="0">
    <tr>
      <td width="550"><div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Order- <?php echo $supplyid ; ?></h4>
        </div>
         <div class="modal-body">
         <?php

//$sql = "SELECT agentcode, agentname, agentpassword, agentstatus, date1 FROM gh WHERE ghvalue='0'";
$sql = "SELECT rid,itembarcode,itemname,itemquantity,amount,itemim FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid'  order by itemname ASC";
$result = $conn->query($sql);
//==============
$sql1="SELECT * FROM supply WHERE  supplyid='$supplyid' and clientid='$clientid' ";
$result1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($result1);
$_SESSION['totalquantity'] = $count ;
//$_SESSION['totalrecord'] = $count ;
//====================

$result5 = mysqli_query($conn,"SELECT SUM(amount) AS value_sum FROM supply WHERE supplyid='$supplyid' and clientid='$clientid' "); 
$row1 = mysqli_fetch_assoc($result5); 
$sum = $row1['value_sum'];
$_SESSION['totalamount']  = $sum ;
if ($result5->num_rows > 0) {


echo "<table class='table table-bordered table-striped'><thead><tr><th>S/NO</th><th>BARCODE</th><th>ITEM NAME</th><th>IMEI NO</th><th>QUANTITY</th><th>AMOUNT</th><th></th></tr></thead>";


     // output data of each row
	 $c=0;
     while($row = $result->fetch_assoc()) {
	 //$c++ ;
         echo "<tr><td>" . ++$c. "</td><td>" . $row["itembarcode"]. "</td><td>" . $row["itemname"]. "</td><td>" . $row["itemim"]. "</td><td>" . $row["itemquantity"]. "</td><td>"  . $row["amount"]. "</td><td><a class='btn btn-info btn-xs' href='removeitem.php?id=". $row["itembarcode"]."'>Remove</a></td></tr>";
		 
	
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
                <td width="34%"><span class="style8 style5"><strong>Total Items</strong></span></td>
                <td width="66%"><span class="style5 style8"><?php echo $count; ?></span></td>
              </tr>
              <tr>
                <td><span class="style8 style5"><strong>Total Amount Due</strong></span></td>
                <td><span class="style5 style8"><?php echo $sum; ?></span></td>
              </tr>
              <tr>
                <td><span class="style10">Discount</span></td>
                <td><span class="style5"><span class="style12"><?php echo $discount; ?></span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><span class="style5"></span></td>
              </tr>
              <tr>
                <td><span class="style8 style5"><strong>
                  <label>Supplied To</label>
                </strong></span></td>
                <td><input name="itemsupplier" type="text" class="style7 style8" id="itemsupplier" value="<?php  echo $itemsupplier ?>" size="10" required="required" /></td>
                <blockquote>&nbsp; </blockquote>
              </tr>
              <tr>
                <td><span class="style8 style5"><strong>
                  <label>Payment Mode</label>
                </strong></span></td>
                <td><p>
                  <select name="paymentmode" class="form-control style6 style8 style8" id="paymentmode" required="required">
                    <option>CASH</option>
                    <option>CHEQUE</option>
                    <option>TRANSFER</option>
                    <option>NILL</option>
                  </select>
                </p>
                  <p><span class="style6"><?php echo $paymentmode;  ?></span> </p></td>
              </tr>
              <tr>
                <td><span class="style8 style5"><strong>Payment Status</strong></span></td>
                <td><span class="style5 style8">
                  <label>
                  <input type="radio" name="paymentstatus" value="Paid" id="paymentstatus_2"  />
                    Credit</label>
                  <br />
                  <label>
                  <input type="radio" name="paymentstatus" value="Not Paid" id="paymentstatus_3" />
                    Debit</label>
                </span>
                  <p class="style5 style8"> <span class="style6"><?php echo $paymentstatus;  ?></span></p></td>
              </tr>
              <tr>
                <td><span class="style8 style5"><strong>
                  <label>Comment</label>
                  (Address, Phone No, Email e.t.c)</strong></span></td>
                <td><textarea name="comment" cols="30" rows="3" class="form-control style6 style8 style8" id="comment" required="required"><?php echo $comment ; ?></textarea></td>
              </tr>
            </table>
            <label></label>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="action" id="action" class="btn btn-info" value="Update Order" />
          
          <input name="button" type="submit" id="button"  class="btn btn-info" onclick="MM_goToURL('parent','../dashboarduser1.php');return document.MM_returnValue" value="Close" />
        </div>
      </div></td>
      <td width="37">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

