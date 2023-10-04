<?php
include('dbconfig.php');

$clientid = $_SESSION['clientid'];
$supplyid = $_GET['id'];
$user_name = $_SESSION['user_name'];

$sql2="SELECT * FROM supply1 WHERE supplyid='$supplyid' and clientid='$clientid'";
$result2=mysqli_query($conn,$sql2);

// Mysql_num_row is counting table row
$count2=mysqli_num_rows($result2);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count2==1){
while($rowval = mysqli_fetch_array($result2))
 {
 
	  $status= $rowval['status'];
	   
}

}

if ($status == "Paid") {

goto a ;
}
else {
goto b ;
}

exit ;

a:
//-------update transstatus------------------------
$sql="Update supply1 Set transstatus = 'Inactive' WHERE supplyid='$supplyid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);
//===================
//=========update profit and loss account
$sql1="Update profitloss Set transstatus = 'Inactive' WHERE transid='$supplyid' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

echo "<script>
alert('Your deletion has been done.');
window.location.href='order.php';
</script>";

exit ;

b:
//-------update transstatus------------------------
$sql="Update supply1 Set transstatus = 'Inactive' WHERE supplyid='$supplyid' and clientid='$clientid'";
$result=mysqli_query($conn,$sql);
//===================

echo "<script>
alert('Your deletion has been done.');
window.location.href='order.php';
</script>";
?>
