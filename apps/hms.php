<?php
session_start() ;

$_SESSION['servicetype'] = "Software Development" ;
$_SESSION['apptype'] = "HR MANAGEMENT SYSTEM" ;
$_SESSION['appabbrv'] = "HMS" ;

echo "<script>
window.location.href='login.php';
</script>";


?>
