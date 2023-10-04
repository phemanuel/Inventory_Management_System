<?php
include ('dbconfig.php');

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='profitaccountalldaily.php';
</script>";

}
else if ($transtype=="Monthly") {
echo "<script>
window.location.href='profitaccountallmonthly.php';
</script>";

}

else if ($transtype=="Yearly") {
echo "<script>
window.location.href='profitaccountallyearly.php';
</script>";

}
else if ($transtype=="Date Range") {
echo "<script>
window.location.href='profitaccountalldate.php';
</script>";

}

?>
