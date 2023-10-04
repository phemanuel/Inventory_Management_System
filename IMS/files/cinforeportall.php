<?php
include ('dbconfig.php');


$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='cinforeportalldaily.php';
</script>";

}
else if ($transtype=="Monthly") {
echo "<script>
window.location.href='tprofitaccountallmonthly.php';
</script>";

}

else if ($transtype=="Yearly") {
echo "<script>
window.location.href='tprofitaccountallyearly.php';
</script>";

}
else if ($transtype=="Date Range") {
echo "<script>
window.location.href='cinforeportalldate.php';
</script>";

}
?>
