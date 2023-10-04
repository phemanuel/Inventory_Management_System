<?php
include ('dbconfig.php');

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='tprofitaccountuserdaily.php';
</script>";

}

else if ($transtype=="Date Range") {
echo "<script>
window.location.href='tprofitaccountuserdate.php';
</script>";

}

?>
