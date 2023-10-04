<?php
session_start();

$appversion = $_SESSION['appversion'];

if ($appversion == "Full" ) {
	
	echo "<script>
window.location.href='register.php';
</script>";
}
elseif ($appversion == "Trial" ) {
	
	echo "<script>
window.location.href='registertrial.php';
</script>";
}
else {
	
	echo "<script>
window.location.href='pricing.php';
</script>";
}
?>