<?php

include ("dbconfig.php");

$totalbaseprice = $_SESSION['totalbaseprice'];
$totalamount = $_SESSION['totalamount'] ;
$discount = $_REQUEST['discount'] ;
$percentvalue = ($totalamount * $discount / 100) ;
$finalamount = ($totalamount  - $percentvalue);

$totalprofit = ($finalamount - $totalbaseprice) ;

$_SESSION['totalprofit']  = $totalprofit ;
$_SESSION['discount']  = $discount ;
$_SESSION['discountconfirm']  = $_SESSION['user_name'] ;
$_SESSION['finalamount']  = $finalamount ;
$_SESSION['totalamount']  = $totalamount ;
echo "<script>
window.location.href='saveitem.php';
</script>";
?>
