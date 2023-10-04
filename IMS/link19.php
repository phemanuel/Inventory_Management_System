<?php
include ('dbconfig.php') ;

$SMG = $_SESSION['SMG'];

if ($SMG == "Enable") {
goto a ;
}
else if ($SMG == "Disable") {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='dashboarduser.php';
</script>";
} 

exit ;

a:

$useremail = $_SESSION['user_email'] ;
$sql="SELECT * FROM user_details WHERE user_email='$useremail'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
echo "<script>
window.location.href='files/supplyid.php';
</script>";
}
else {
echo "<script>
alert('You are not profiled for this section.');
window.location.href='clientcheck.php';
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
