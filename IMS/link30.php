<?php
session_start();

$SMG = $_SESSION['SMG'];

if ($SMG == "Enable") {
echo "<script>
window.location.href='files/dataid1.php';
</script>";
}
else if ($SMG == "Disable") {
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
