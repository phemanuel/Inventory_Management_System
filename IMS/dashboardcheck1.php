<?php
session_start() ;


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


$clientid = $_SESSION['clientid'];
$clientname = $_SESSION['clientname'];
$clientname1 = strtoupper($clientname);
$username = $_SESSION['user_name'];
$username1 = strtoupper($username);
$clientstatus = $_SESSION['clientstatus'];
$clientplan = $_SESSION['clientplan'];
$clienttype = $_SESSION['clienttype'];
$clientsize = $_SESSION['clientsize'];

$usertype=$_SESSION['type'];

if ($clientid=="ISPIMS") {

goto g ;

}
else if ($clientid=="COINMARTIMS") {

goto i ;

}
else if ($clientid=="RoyalIMS") {

goto v ;

}
else {

goto h ;
}

exit ;

g:

if ($usertype == "master") {
echo "<script>
window.location.href='dashboarduserISP.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboarduserISP.php';
</script>";
}

exit ;

v:

if ($usertype == "master") {
echo "<script>
window.location.href='dashboarduserROYAL.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboarduserROYAL.php';
</script>";
}

exit ;

h:

if ($usertype == "master") {
echo "<script>
window.location.href='dashboardusero.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboardusero.php';
</script>";
}

exit;

i:
if ($usertype == "master") {
echo "<script>
window.location.href='dashboardCM.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboardCM.php';
</script>";
}

?>
