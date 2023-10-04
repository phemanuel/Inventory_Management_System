<?php
include('dbconfig.php');

$user_type = $_SESSION['type'];

if ($user_type =='master') {
    echo "<script>
window.location.href='trading.php';
</script>";
} else if ($user_type == 'user') {
    echo "<script>
    window.location.href='trading_user.php';
    </script>";
}

?>