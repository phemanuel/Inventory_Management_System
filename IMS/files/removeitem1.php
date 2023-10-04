<?php

 include "dbconfig.php" ;
 
$itembarcode = $_SESSION['itembarcode'];
$supplyid = $_SESSION['supplyid'];
$clientid = $_SESSION['clientid'];
//=========get item total quantity=================
$sql5="SELECT * FROM product WHERE product_barcode='$itembarcode' and clientid='$clientid' ";
$result5=mysqli_query($conn,$sql5);

// Mysql_num_row is counting table row
$count5=mysqli_num_rows($result5);

// If result matched $myusername and $mypassword, table row must be 1 row

while($rowval = mysqli_fetch_array($result5))
 {

   $quantitykeep= $rowval['product_quantity'];
}

$_SESSION['quantitykeep'] = $quantitykeep;




//======get item quantity supplied========================
$sql="SELECT * FROM supply WHERE itembarcode='$itembarcode' and supplyid='$supplyid' and clientid='$clientid' ";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
while($rowval = mysqli_fetch_array($result))
 {

   $itemquantity= $rowval['itemquantity'];
}

$_SESSION['itemquantity'] = $itemquantity;
goto a;
}


else {
echo "<script>
alert('No item to be deleted.');
window.location.href='checkout.php';
</script>";
}
exit ;
a:

$sql1="DELETE FROM supply WHERE itembarcode='$itembarcode' and supplyid='$supplyid' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

goto b ;

exit ;

b:

$quantitykeep = $quantitykeep;
$itemquantity = $itemquantity;
$quantityremain = ($quantitykeep + $itemquantity);


$sql2 = "UPDATE product SET product_quantity='$quantityremain' WHERE product_barcode='$itembarcode' and clientid='$clientid'"; 
$result2 = mysqli_query($conn,$sql2);
if(! $result2 ) {
                echo "<script>
window.location.href='checkout.php';
</script>";
            }
            echo "<script>

window.location.href='checkout.php';
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
