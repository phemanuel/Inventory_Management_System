<?php
session_start() ;

$_SESSION['servicetype'] = "Software Development" ;
$_SESSION['apptype'] = "ACCOUNTING MANAGEMENT SYSTEM" ;
$_SESSION['appabbrv'] = "AMS" ;

echo "<script>
window.location.href='login.php';
</script>";


?>
