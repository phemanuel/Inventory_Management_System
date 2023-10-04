<?php
session_start();

$RPT = $_SESSION['RPT'];

if ($RPT == "Enable") {
echo "<script>
window.location.href='dashboardreport.php';
</script>";
}
else if ($RPT == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='dashboarduser.php';
</script>";
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
