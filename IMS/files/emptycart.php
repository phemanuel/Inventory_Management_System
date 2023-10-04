<?php
include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$supplyid = $_SESSION['supplyid'];

$sql="DELETE  FROM supply WHERE supplyid='".$supplyid."' and clientid='".$clientid."'";
$result=mysqli_query($conn,$sql);
		echo "<script>
 alert('Cart is empty.');
window.location.href='supplyid.php';
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
