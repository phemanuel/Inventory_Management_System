<?php
session_start();
$appabbrv = $_SESSION['appabbrv'];

if ($appabbrv == "IMS") {
echo "<script>
window.location.href='imsstafflogin.php';
</script>";
}
else if ($appabbrv == "EMS") {
echo "<script>
window.location.href='emsstafflogin.php';
</script>";
}
else if ($appabbrv == "HMS") {
echo "<script>
window.location.href='hmsstafflogin.php';
</script>";
}
else if ($appabbrv == "AMS") {
echo "<script>
window.location.href='hmsstafflogin.php';
</script>";
}


?>
