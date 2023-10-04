<?php
include "dbconfig.php";

$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$username = $_SESSION['user_name'];
$username1 = strtoupper($username);
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];

if ( empty ( $_SESSION['clientid'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='logout.php';
</script>";
}
else if ( empty ( $_SESSION['user_name'])) {
echo "<script>
alert('Your session has expired, try to login again.');
window.location.href='logout.php';
</script>";
}
else {

} 


if ($clientid=="ISPIMS") {

echo "<script>

window.location.href='performancedashboardISP.php';
</script>";

}
else if ($clientid=="COINMARTIMS") {

echo "<script>

window.location.href='performancedashboardCM.php';
</script>";

}
else {
	
echo "<script>

window.location.href='performancedashboard.php';
</script>";
}
?>