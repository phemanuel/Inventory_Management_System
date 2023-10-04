<?php
session_start() ;

$_SESSION['servicetype'] = "Software Development" ;
$_SESSION['apptype'] = "EDUTECH MANAGEMENT SYSTEM" ;
$_SESSION['appabbrv'] = "EMS" ;

echo "<script>
window.location.href='login.php';
</script>";


?>
