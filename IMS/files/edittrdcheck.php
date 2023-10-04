<?php
session_start();

$ADM = $_SESSION['ADM'];

if ($ADM == "Enable") {
echo "<script>
window.location.href='edittrd.php';
</script>";
}
else if ($ADM == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='../dashboarduser.php';
</script>";
} 
?>