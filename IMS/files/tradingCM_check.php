<?php
include('dbconfig.php');

$user_type = $_SESSION['type'];

if ($user_type =='master') {
    echo "<script>
window.location.href='tradingCM.php';
</script>";
} else if ($user_type == 'user') {
    echo "<script>
    window.location.href='tradingCM_user.php';
    </script>";
}

?>