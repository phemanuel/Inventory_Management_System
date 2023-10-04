<?php
include ("dbconfig.php");

$customer_name=$_REQUEST['customer_name'];
$_SESSION['customer_namekeep'] = $customer_name ;

echo "<script>

window.location.href='supplyid.php';
</script>";





?>


