
<?php

include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$confirmby = $_SESSION['user_name'];
$itemid = $_SESSION['product_id'];
$user_id = $_SESSION['user_id'];
$supplyid = $_SESSION['supplyid'];
$itemname = $_SESSION['itemname'];
$itembarcode = $_SESSION['itembarcode'];
$quantitykeep = $_SESSION['quantitykeep'];
$itemquantity = 1;
$itemunit = $_SESSION['itemunit'];
$itembaseprice = $_SESSION['itembaseprice'];
$itemprice = $_SESSION['itemprice'];
$supplydate = date('Y-m-d');
$mobileno = "Nill";
$datekeep=strtotime($supplydate);
$monthkeep=date("F",$datekeep);
$yearkeep=date("Y",$datekeep);
$producttype = $_SESSION['producttype'];

//==========get item values------------------
$sql="SELECT * FROM product WHERE product_id='$itemid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

   $quantitykeep= $rowval['product_quantity'];
$_SESSION['quantitykeep'] = $quantitykeep;
//$picnamekeep= $rowval['picturename'];

}

}
if ($itemquantity > $quantitykeep) {
echo "<script>
alert ('You cannot sell the item, the quantity entered is higher than the stock.');
window.location.href='supply.php';
</script>";

}
else {

goto g ;
}

exit ;


g:
//------------calculate amount=-------------------
$baseamount = ($itembaseprice * $itemquantity);
$amount = ($itemprice * $itemquantity);
$profit = ($amount - $baseamount) ;
$discount = "0" ; 
$_SESSION['discount']  = $discount ;
$_SESSION['discountconfirm']  = "NILL" ;
//=====================

//check for available email
$sql1="SELECT * FROM supply WHERE supplyid='$supplyid' and clientid='$clientid' and itembarcode='$itembarcode'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

echo "<script>
alert('Item has been added to cart already.');
window.location.href='supply.php';
</script>";
}
else {
$sql="INSERT INTO supply (supplyid,itembarcode,itemname,itemquantity,itemunit,itemprice,itembaseprice,supplydate,amount,confirmby,clientid,user_id,itemid,mobileno,month1,year1,product_profit,product_type)
VALUES
('$supplyid','$itembarcode', '$itemname','$itemquantity','$itemunit','$itemprice','$itembaseprice','$supplydate','$amount','$confirmby','$clientid','$user_id','$itemid','$mobileno','$monthkeep','$yearkeep','$profit','$producttype')";
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error());
}

mysqli_close($conn);
//echo ("Information has been submitted");
//goto a;
echo "<script>
window.location.href='supply.php';
</script>";
}
//exit ;



?>


