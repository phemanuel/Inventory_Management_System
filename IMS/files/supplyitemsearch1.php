<?php
include ("dbconfig.php");

$itemid = $_SESSION['barcode'];
$_SESSION['product_id'] = $itemid;
$clientid = $_SESSION['clientid'];
$user_name = $_SESSION['user_name'];


//==========get item values------------------
$sql="SELECT * FROM product WHERE product_barcode='$itemid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1 or $count > 1){
while($rowval = mysqli_fetch_array($result))
 {
 $itembarcode= $rowval['product_barcode'];
  $itemname= $rowval['product_name'];
   $quantitykeep= $rowval['product_quantity'];
    $itemunit= $rowval['product_unit'];
	$itembaseprice= $rowval['product_base_price'];
	  $itemprice= $rowval['product_sell_price'];
	  $producttype = $rowval['product_type'];
//$picnamekeep= $rowval['picturename'];


}
$_SESSION['itemname'] = $itemname;
$_SESSION['itembarcode'] = $itembarcode;
$_SESSION['quantitykeep'] = $quantitykeep;
$_SESSION['itemunit'] = $itemunit;
$_SESSION['itembaseprice'] = $itembaseprice;
$_SESSION['itemprice'] = $itemprice;
$_SESSION['producttype'] = $producttype;
}

//---- check for product type==========

if ($producttype == "Product") {
echo "<script>

window.location.href='supplyitem1.php';
</script>";
} 
else if ($producttype == "Services") {
echo "<script>

window.location.href='supplyitem2.php';
</script>";
} 


?>


