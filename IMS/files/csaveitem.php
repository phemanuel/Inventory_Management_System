<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$confirmby = $_SESSION['user_name'];
$mobileno = $_SESSION['mobileno'];


$supplyid = $_SESSION['supplyid'];
$totalquantity = $_SESSION['totalquantity'];
$totalamount = $_SESSION['totalamount'];
$finalamount = $_SESSION['totalamount'];
$totalprofit = $_SESSION['totalprofit'];
$discount = $_SESSION['discount'];
$discountconfirm = $_SESSION['discountconfirm'];
$itemsupplier = $_SESSION['itemsupplier'];
$paymentmode = $_REQUEST['paymentmode'];
$status = $_REQUEST['paymentstatus'];
$comment = $_SESSION['comment'];
$_SESSION['itemsupplier'] = $itemsupplier;
$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['status'] = $status;
$supplydate = date('Y-m-d');
$user_id = $_SESSION['user_id'];
$datekeep=strtotime($supplydate);
$monthkeep=date("F",$datekeep);
$yearkeep=date("Y",$datekeep);



$sql6="SELECT * FROM corder1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result6=mysqli_query($conn,$sql6);

// Mysql_num_row is counting table row
$count6=mysqli_num_rows($result6);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count6==1){

echo "<script>
alert('Pre-order has been made already.');
window.location.href='cporder.php';
</script>";
}
else {
$sql="INSERT INTO corder1 (supplyid,totalquantity,totalamount,finalamount,totalprofit,clientid,supplydate,confirmby,paymentmode,comment,itemsupplier,status,user_id,mobileno,month1,year1,discount,discountconfirm)
VALUES
('$supplyid','$totalquantity', '$totalamount','$finalamount','$totalprofit','$clientid','$supplydate','$confirmby','Nill','$comment','$itemsupplier','$status','$user_id','$mobileno','$monthkeep','$yearkeep','$discount','$discountconfirm')";
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}

echo "<script>

window.location.href='cinvoice.php';
</script>";
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
