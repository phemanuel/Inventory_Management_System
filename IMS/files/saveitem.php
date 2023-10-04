<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$confirmby = $_SESSION['user_name'];
$mobileno = $_SESSION['mobileno'];

$totalbaseprice = $_SESSION['totalbaseprice'];
$supplyid = $_SESSION['supplyid'];
$totalquantity = $_SESSION['totalquantity'];
$totalamount = $_SESSION['totalamount'];
$finalamount = $_SESSION['finalamount'];
$totalprofit = $_SESSION['totalprofit'];
$discount = $_SESSION['discount'];
$discountconfirm = $_SESSION['discountconfirm'];
$itemsupplier = $_SESSION['itemsupplier'];
$paymentmode = $_SESSION['paymentmode'];
$status = $_SESSION['status'];
$comment = "Order made by " . $itemsupplier;
$_SESSION['itemsupplier'] = $itemsupplier;
$_SESSION['paymentmode'] = $paymentmode;
$_SESSION['status'] = $status;
$supplydate = date('Y-m-d');
$user_id = $_SESSION['user_id'];
$datekeep=strtotime($supplydate);
$monthkeep=date("F",$datekeep);
$yearkeep=date("Y",$datekeep);
$refcode = $_SESSION['refcode'];


//-------------------------------------------

if ($status == "Paid") {
goto e ;
}
else if ($status == "Not Paid") {
goto v ;
}
else if ($status == "Pre-order") {
goto u ;
}

exit ;

e:
//check for available email
$sql1="SELECT * FROM supply1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

echo "<script>
alert('Transaction has been made already.');
window.location.href='supplyid.php';
</script>";
}
else {
$sql="INSERT INTO supply1 (supplyid,totalquantity,totalamount,finalamount,totalprofit,clientid,supplydate,confirmby,paymentmode,comment,itemsupplier,status,user_id,mobileno,month1,year1,discount,discountconfirm,transstatus,confirmstatus,totalbaseprice,refcode)
VALUES
('$supplyid','$totalquantity', '$totalamount','$finalamount','$totalprofit','$clientid','$supplydate','$confirmby','$paymentmode','$comment','$itemsupplier','$status','$user_id','$mobileno','$monthkeep','$yearkeep','$discount','$discountconfirm','Active','Not Confirmed','$totalbaseprice','$refcode')";

$sql2 = "UPDATE supply SET mobileno = '$mobileno',refcode = '$refcode' WHERE supplyid = '$supplyid'" ;
$result2=mysqli_query($conn,$sql2);

if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}
goto c;
//echo ("Information has been submitted");

}
exit ;

c:
$credit = $finalamount;
$debit = "0";
$transdate = date('Y-m-d');
$transtime = date("h:i:sa");
$paymenttype = "credit";
$narration = "Sales : " . $itemsupplier . " " . $mobileno ;
$sql2="INSERT INTO profitloss (credit,debit,paymenttype,clientid,transdate,transtime,confirmby,transid,user_id,month1,year1,narration,transstatus)
VALUES
('$credit','$debit', '$paymenttype','$clientid','$transdate','$transtime','$confirmby','$supplyid','$user_id','$monthkeep','$yearkeep', '$narration','Active')";

if (!mysqli_query($conn,$sql2))
{
die('error:' . mysqli_error());
}
echo "<script>

window.location.href='invoice.php';
</script>";
mysqli_close($conn);

exit;
u:

$sql6="SELECT * FROM supply1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result6=mysqli_query($conn,$sql6);

// Mysql_num_row is counting table row
$count6=mysqli_num_rows($result6);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count6==1){

echo "<script>
alert('Pre-order has been made already.');
window.location.href='supplyid.php';
</script>";
}
else {
$sql="INSERT INTO supply1 (supplyid,totalquantity,totalamount,finalamount,totalprofit,clientid,supplydate,confirmby,paymentmode,comment,itemsupplier,status,user_id,mobileno,month1,year1,discount,discountconfirm,transstatus,confirmstatus,refcode)
VALUES
('$supplyid','$totalquantity', '$totalamount','$finalamount','$totalprofit','$clientid','$supplydate','$confirmby','Nill','$comment','$itemsupplier','$status','$user_id','$mobileno','$monthkeep','$yearkeep','$discount','$discountconfirm','Active','Not Confirmed','$refcode')";
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}

echo "<script>

window.location.href='invoice.php';
</script>";
}
exit;
v:
$sql4="SELECT * FROM supply1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result4=mysqli_query($conn,$sql4);

// Mysql_num_row is counting table row
$count4=mysqli_num_rows($result4);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count4==1){

echo "<script>
alert('Transaction has been made already.');
window.location.href='supplyid.php';
</script>";
}
else {
$sql="INSERT INTO supply1 (supplyid,totalquantity,totalamount,finalamount,totalprofit,clientid,supplydate,confirmby,paymentmode,comment,itemsupplier,status,user_id,mobileno,month1,year1,discount,discountconfirm,transstatus,confirmstatus,refcode)
VALUES
('$supplyid','$totalquantity', '$totalamount','$finalamount','$totalprofit','$clientid','$supplydate','$confirmby','$paymentmode','$comment','$itemsupplier','$status','$user_id','$mobileno','$monthkeep','$yearkeep','$discount','$discountconfirm','Active','Not Confirmed','$refcode')";
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}

goto h ;
}
exit;

h:
$credit = "0";
$debit = $finalamount;
$transdate = date('Y-m-d');
$transtime = date("h:i:sa");
$paymenttype = "debit";
$narration = "Sales : " . $itemsupplier . " " . $mobileno ;
$sql5="INSERT INTO profitloss (credit,debit,paymenttype,clientid,transdate,transtime,confirmby,transid,user_id,month1,year1,narration,transstatus)
VALUES
('$credit','$debit', '$paymenttype','$clientid','$transdate','$transtime','$confirmby','$supplyid','$user_id','$monthkeep','$yearkeep', '$narration','Active')";

if (!mysqli_query($conn,$sql5))
{
die('error:' . mysqli_error());
}
echo "<script>

window.location.href='invoice.php';
</script>";
mysqli_close($conn);



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
