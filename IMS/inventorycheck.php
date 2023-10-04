<?php
include('dbconfig.php');

$clientid = $_SESSION['clientid'] ;

if ($clientid == 'ISPIMS') {
	
	echo "<script>
window.location.href='iereportISP.php';
</script>";
}
elseif ($clientid == 'COINMARTIMS') {
	
	echo "<script>
window.location.href='iereportCM.php';
</script>";
}
else {
	echo "<script>
window.location.href='iereport.php';
</script>";
}

?>