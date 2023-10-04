<?php
session_start();

$TRDREP = $_SESSION['TRDREP'];
//$ADM = $_SESSION['ADM'];
//echo $ADM. $TRDREP ;

if ($TRDREP == "Enable") {
echo "<script>
window.location.href='tprofitaccount.php';
</script>";
}
else if ($TRDREP == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='../dashboarduser.php';
</script>";
} 
?>