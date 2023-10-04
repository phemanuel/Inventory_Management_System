<?php
include ("dbconfig.php");

$itemid = $_GET['id'];
$_SESSION['customerid'] = $itemid;
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];


//==========get item values------------------
$sql="SELECT * FROM supply1 WHERE mobileno='$itemid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

echo "<script>
window.location.href='customerorder1.php';
</script>";
}
else if($count>=1){

echo "<script>
window.location.href='customerorder1.php';
</script>";
}
else {

echo "<script>
alert('Customer has not made any orders.');
window.location.href='customersetup.php';
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
