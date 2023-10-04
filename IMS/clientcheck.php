<?php
include_once 'dbconfig.php';


$usertype = $_SESSION['type'];


if ($usertype == "master") {
echo "<script>
window.location.href='dashboard.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboarduser.php';
</script>";
}


?>
