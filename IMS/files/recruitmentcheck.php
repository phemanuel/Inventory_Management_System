<?php

include('dbconfig.php');
$clientid = $_SESSION['clientid'];
$clientsize = $_SESSION['clientsize'];

//==========get no of staff created------------------
$sql="SELECT * FROM user_details WHERE  clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

//-------check for client size for access to create---
if ($count >= $clientsize) {

	echo "<script>
alert('You cannot exceed the number of staff to create, please contact our support team to upgrade your plan.');
window.location.href='../dashboardcheck.php';
</script>";
}
elseif ($count < $clientsize) {

	echo "<script>
window.location.href='recruitment.php';
</script>";
}
?>