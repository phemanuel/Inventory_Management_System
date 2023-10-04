<?php
include ("dbconfig.php");

$mobileno=$_REQUEST['mobileno'];

$sql="SELECT * FROM customer WHERE mobileno='$mobileno'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

$customername = $rowval['customername'];
$emailaddy = $rowval['emailaddy'];


$_SESSION['customername'] = $rowval['customername'];
$_SESSION['emailaddy'] = $rowval['emailaddy'];
$_SESSION['mobileno'] = $mobileno;

//$picnamekeep= $rowval['picturename'];


}
echo "<script>

window.location.href='corderid.php';
</script>";

}
else {
echo "<script>
alert('Mobile No does not exist,register the customer details.');
window.location.href='supplylogin.php';
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
