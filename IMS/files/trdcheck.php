<?php
session_start();

$trdtype = $_REQUEST['trdtype'];

if ($trdtype=="RMB/USDT RATE") {
echo "<script>
window.location.href='trdusdcal.php';
</script>";
}
else if ($trdtype=="NAIRA RATE") {
echo "<script>
window.location.href='trdnairacal.php';
</script>";
}
else {

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
