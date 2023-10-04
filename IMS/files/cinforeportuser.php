<?php
include ('dbconfig.php');

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='cinforeportuserdaily.php';
</script>";

}

else if ($transtype=="Date Range") {
echo "<script>
window.location.href='cinforeportuserdate.php';
</script>";

}

?>
