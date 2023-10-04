<?php
//logout.php
session_start();

session_destroy();

echo "<script>
window.location.href='../../apps/index.php';
</script>";


?>