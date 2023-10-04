<?php
include('dbconfig.php');

$clientid = $_SESSION['clientid'];
$product_id = $_SESSION['product_id'];
$user_name = $_SESSION['user_name'];
$remark = $_REQUEST['remark'];

//-----check for access to delete-----


//-------update transstatus------------------------
$sql="Update trading Set status = 'Inactive', profit= '0', remark='$remark' WHERE product_id='$product_id' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);
//===================
echo "<script>
alert('Deactivation successful.');
window.location.href='edittrd.php';
</script>";



?>
