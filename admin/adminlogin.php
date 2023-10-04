<?php

$adminuser = $_REQUEST['adminuser'];
$adminpass = $_REQUEST['adminpass'];


if ($adminuser == "eitcadmin" && $adminpass == "eitc@231027") {

echo "<script>

window.location.href='adminpage.php';
</script>";
}

else{
echo "<script>
alert('Invalid userid or password.');
window.location.href='index.php';
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
