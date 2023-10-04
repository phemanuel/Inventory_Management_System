<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$itemid = $_SESSION['supplyid'];
$mobileno = $_SESSION['mobileno'];

if ( empty ( $_REQUEST['paymentstatus'])) {
echo "<script>
alert('Select the payment status.');
window.location.href='editorder1.php';
</script>";
}
else {
goto f ;
}

exit ;

f:

//========
$itemsupplier = $_REQUEST['itemsupplier'];
$paymentmode = $_REQUEST['paymentmode'];
$paymentstatus = $_REQUEST['paymentstatus'];
$comment = $_REQUEST['comment'];
$totalamount = $_SESSION['totalamount'];


$_SESSION['itemsupplier'] = $itemsupplier ;
$_SESSION['paymentmode'] = $paymentmode ;
$_SESSION['paymentstatus'] = $paymentstatus ;
$_SESSION['comment'] = $comment ;

//update password-------
$sql2 = "UPDATE supply1 SET paymentmode='".$paymentmode."',status='".$paymentstatus."' WHERE supplyid='".$itemid."' and clientid='".$clientid."'";
   $result2 = mysqli_query($conn,$sql2);


if ($paymentstatus == "Paid") {
goto y;

}
else{

echo "<script>
alert('order has been Updated.');
window.location.href='invoice1.php';
</script>";

}


exit;

y:
$credit = $totalamount;
$debit = "0";
$transdate = date('Y-m-d');
$transtime = date("h:i:sa");
$datekeep=strtotime($transdate);
$monthkeep=date("F",$datekeep);
$yearkeep=date("Y",$datekeep);
$paymenttype = "credit";
$confirmby = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];

//===========check for duplicate==========================
$sql5 = "SELECT * FROM profitloss WHERE transid='".$itemid."' and clientid='".$clientid."' " ;
$result5=mysqli_query($conn,$sql5);
$count5=mysqli_num_rows($result5);
if($count5==1){
goto g;
}
else {
goto h;

}

exit;
g:
//=========update existing=================
$narration = "Sales : " . $itemsupplier . " " . $mobileno ;
$sql6 = "UPDATE profitloss SET credit='".$credit."',month1='".$monthkeep."' ,year1='".$yearkeep."',narration = '$narration' WHERE transid='".$itemid."' and clientid='".$clientid."'";
   $result6 = mysqli_query($conn,$sql6);

echo "<script>
alert('order has been Updated.');
window.location.href='invoice1.php';
</script>";
exit;

h:
$narration = "Sales : " . $itemsupplier . " " . $mobileno ;
//=========insert new====================
$sql2="INSERT INTO profitloss (credit,debit,paymenttype,clientid,transdate,transtime,confirmby,transid,user_id,month1,year1,narration)
VALUES
('$credit','$debit', '$paymenttype','$clientid','$transdate','$transtime','$confirmby','$itemid','$user_id','$monthkeep','$yearkeep','$narration')";

if (!mysqli_query($conn,$sql2))
{
die('error:' . mysqli_error());
}
echo "<script>
alert('order has been Updated.');
window.location.href='invoice1.php';
</script>";
mysqli_close($conn);


// Mysql_num_row is counting table row



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
