<?php
session_start();

$ADM = $_SESSION['ADM'];
// $AMG = $_SESSION['AMG'];

if ($ADM == "Enable") {
echo "<script>
window.location.href='files/performancedashboardcheck.php';
</script>";
}
// else if ($AMG == "Enable") {
// echo "<script>
// window.location.href='files/inventory.php';
// </script>"; 
// }
else if ($ADM == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='dashboardcheck1.php';
</script>";
} 
// else if ($AMG == "Disable") {
// echo "<script>
// alert('You are not profiled for this section.');
// window.location.href='dashboardcheck1.php';
// </script>";
// } 
?>

