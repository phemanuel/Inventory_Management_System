<?php
include ('dbconfig.php');

$transname  = $_SESSION['transname'] ;
$transtype  = $_SESSION['transtype'] ;

if ($transtype=="Daily") {
echo "<script>
window.location.href='profitaccountuserdaily.php';
</script>";

}
else if ($transtype=="Monthly") {
echo "<script>
window.location.href='profitaccountusermonthly.php';
</script>";

}

else if ($transtype=="Yearly") {
echo "<script>
window.location.href='profitaccountuseryearly.php';
</script>";

}
else if ($transtype=="Date Range") {
echo "<script>
window.location.href='profitaccountuserdate.php';
</script>";

}

?>
