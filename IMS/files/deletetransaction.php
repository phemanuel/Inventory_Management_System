<?php
include('dbconfig.php');

$clientid = $_SESSION['clientid'];
$product_id = $_GET['id'];
$user_name = $_SESSION['user_name'];

//-----check for access to delete-----
$DELTRS = $_SESSION['DELTRS'];

if ($DELTRS == "Enable") {
goto a;
}
else if ($DELTRS == "Disable") {
echo "<script>
alert('You are not profiled for this action.');
window.location.href='trading.php';
</script>";
} 

exit;
//---------------

a:

//-------update transstatus------------------------
$sql="Update trading Set status = 'Inactive' WHERE product_id='$product_id' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);
//===================
echo "<script>
alert('Your deletion has been done.');
window.location.href='trading.php';
</script>";



?>
