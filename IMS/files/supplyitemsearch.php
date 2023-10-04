<?php
include ("dbconfig.php");

$barcode = $_REQUEST['barcode'];
$_SESSION['barcode'] = $barcode;
$clientid = $_SESSION['clientid'];

//==========get item values------------------
$sql="SELECT * FROM product WHERE product_barcode='$barcode' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 or $count >1){
echo "<script>

window.location.href='supplyitemsearch1.php';
</script>";

}

else {

echo "<script>
alert('Item not available');
window.location.href='itemsearch.php';
</script>";
}



?>


