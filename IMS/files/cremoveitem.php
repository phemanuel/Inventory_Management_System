<?php

 include "dbconfig.php" ;
 
$itembarcode = $_GET['id'];
$supplyid = $_SESSION['supplyid'];
$producttype = $_SESSION['producttype'];
$clientid = $_SESSION['clientid'];
$_SESSION['itembarcode'] = $itembarcode;
//=========get item total quantity=================
if ($producttype == "Product") {
echo "<script>

window.location.href='cremoveitem1.php';
</script>";
} 
else if ($producttype == "Services") {
echo "<script>

window.location.href='cremoveitem2.php';
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
