<?php
include ("dbconfig.php");
$clientid = $_SESSION['clientid'];
$supplyid = $_SESSION['supplyid'];

$sql1="SELECT * FROM supply WHERE supplyid='$supplyid' and clientid='$clientid'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

echo "<script>

window.location.href='checkout1.php';
</script>";
}
else if($count > 1){

echo "<script>

window.location.href='checkout1.php';
</script>";
}
else {
echo "<script>
alert('No transaction has been made.');
window.location.href='supplyid.php';
</script>";
}
?>