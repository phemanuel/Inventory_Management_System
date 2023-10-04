<?php
include ('dbconfig.php');

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='datainforeportuserdaily.php';
</script>";

}

else if ($transtype=="Date Range") {
echo "<script>
window.location.href='datainforeportuserdate.php';
</script>";

}

?>
