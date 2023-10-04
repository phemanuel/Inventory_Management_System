<?php
include ('dbconfig.php');

$yearkeep = date('Y');
$clientname = $_SESSION['clientname'];
$clientid = $_SESSION['clientid'];
$datekeep = date('Y-m-d');
$clienttypeold = $_SESSION['clienttypeold'];
$clienttypenew = $_SESSION['clienttypenew'];
$clientplan = $_SESSION['clienttypenew'];
$clientsub = $_REQUEST['clientsub'];
$pricekeep = $_SESSION['pricekeep'];
$apricekeep = $_SESSION['apricekeep'];
$cplanduedate = $_SESSION['cplanduedate'];
//===================================
if ($clientsub == "Monthly") {

$pricekeep = $pricekeep ;
$clientplan = "1";
}
else if ($clientsub == "Annually") {

$pricekeep = $apricekeep ;
$clientplan = "12";
}
//================

//============= Get price===============

$sql1="SELECT * FROM accountupgrade WHERE clientid='$clientid' and clientname='$clientname'  ";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
goto v ;
}
else {
goto a;

}

exit;

a:

//========insert into db
$sql="INSERT INTO accountupgrade (clientid,clientname,currentplan, upgradeplan,clientsub,date1,clientprice,cplanduedate,upgradestatus)
VALUES
('$clientid', '$clientname','$clienttypeold', '$clienttypenew', '$clientsub','$datekeep', '$pricekeep','$cplanduedate', 'Inactive')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
$result=mysqli_query($conn,$sql);
//=======================
  echo "<script>
alert('Your submission is been processed, we will get back to you.');
window.location.href='../apps/index.php';
</script>";

exit;

v:
//===========update existing================

 $sql2 = "UPDATE accountupgrade SET currentplan = '$clienttypeold' ,upgradeplan = '$clienttypenew',clientprice = '$pricekeep', clientsub = '$clientsub',upgradestatus = 'Inactive' WHERE clientid='$clientid' ";
$result2=mysqli_query($conn,$sql2);

echo "<script>
alert('Your submission is been processed, we will get back to you.');
window.location.href='../apps/index.php';
</script>";
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
