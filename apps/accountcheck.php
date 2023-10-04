<?php




$accounttype = $_REQUEST['accounttype'] ;

if ($accounttype == "Administrator") {
echo "<script>

window.location.href='adminlogin.php';
</script>";
}
else if ($accounttype == "Staff") {
echo "<script>

window.location.href='stafflogin.php';
</script>";
}


?>
