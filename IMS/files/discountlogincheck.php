<?php
session_start();

$DIS = $_SESSION['DIS'];

if ($DIS == "Enable") {
echo "<script>
window.location.href='discountpage.php';
</script>";
}
else if ($DIS == "Disable") {
echo "<script>
alert('You are not profiled to give discount.');
window.location.href='checkout1.php';
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
