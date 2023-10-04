<?php

session_start();

$appabrv = $_SESSION['appabbrv'];

if ($appabbrv=="IMS"){

	echo "<script>

window.location.href='apps/registerIMtrial.php';
</script>";
} 
elseif ($appabbrv=="EMS"){

	echo "<script>

window.location.href='apps/registerEMtrial.php';
</script>";
} 
elseif ($appabbrv=="HMS"){

	echo "<script>

window.location.href='apps/registerHMtrial.php';
</script>";
} 

?>