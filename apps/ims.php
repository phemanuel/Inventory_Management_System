<?php
session_start() ;

$_SESSION['servicetype'] = "Software Development" ;
$_SESSION['apptype'] = "INVENTORY MANAGEMENT SYSTEM" ;
$_SESSION['appabbrv'] = "IMS" ;

echo "<script>
window.location.href='login.php';
</script>";


?>
