<?php
include ("dbconfig.php") ;
$startdate1 = date('d-m-Y');
$startdate = date("Y-m-d", strtotime($startdate1)); 
$duedate1 = $_REQUEST['duedate'];
$duedate = date("Y-m-d", strtotime($duedate1)); 

$clientid = $_SESSION['clientid'];

$sql = " UPDATE clientreg SET startdate = '$startdate', duedate = '$duedate', clientstatus = 'Active' WHERE clientid = '$clientid' ";
$result=mysqli_query($conn,$sql);
//======================
$sql1 = " UPDATE user_details SET  user_status = 'Active' WHERE clientid = '$clientid' ";
$result1=mysqli_query($conn,$sql1);

echo "<script>
alert('The account has been activated.');
window.location.href='index.php';
</script>";


?>