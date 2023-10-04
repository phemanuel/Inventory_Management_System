<?php
session_start();

$AMG = $_SESSION['AMG'];
$clientid = $_SESSION['clientid'] ;

if ($AMG == "Enable") {
goto a;
}
else if ($AMG == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='dashboarduser.php';
</script>";
} 
exit;

a:

if ($clientid=="ISPIMS"){
    echo "<script>
window.location.href='dashboardaccount.php';
</script>";
}
elseif ($clientid=="COINMARTIMS"){
    echo "<script>
window.location.href='dashboardaccount.php';
</script>";
}
else {
    echo "<script>
window.location.href='dashboardaccounto.php';
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
