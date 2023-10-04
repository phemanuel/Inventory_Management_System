<?php
include "dbconfig.php" ; 
//$yearkeep = $_SESSION['yearkeep'];
$clientid = $_SESSION['clientid'];

$usertype = $_SESSION['type'];

if ($usertype == "master") {
echo "<script>
window.location.href='order.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='orderuser.php';
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
