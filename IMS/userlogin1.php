<?php
 //session_start(); 
 
  
include_once 'dbconfig.php';



// username and password sent from form 
$useremail=$_REQUEST['user_email']; 
$userpass=$_REQUEST['user_password']; 
$_SESSION['user_email'] = $useremail ;
$_SESSION['user_password'] = $userpass ;

$sql="SELECT * FROM user_details WHERE user_email='$useremail' and user_password='$userpass'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

$usertype = $rowval['user_type'];
$userstatus = $rowval['user_status'];
$_SESSION['type'] = $rowval['user_type'];
$_SESSION['user_id'] = $rowval['user_id'];
$_SESSION['user_name'] = $rowval['user_name'];
//$picnamekeep= $rowval['picturename'];


}
goto a ;
//}

//header("location:adminpage.php");
}
else {
echo "<script>
alert('Invalid email or password.');
window.location.href='userlogin.php';
</script>";
//header("location:adminsigninerror.html");
//echo "<tr><td><a>Invalid Username or Password.</a></td></tr>";
//echo "<tr><td><a href='adminsignin.html'>Back to Admin Login.</a></td></tr>";
}
exit ;

a:

if ($userstatus == "Active") {
echo "<script>
window.location.href='dashboarduser.php';
</script>";
}
else {
echo "<script>
alert('Your account is disabled, Contact HR');
window.location.href='userlogin.php';
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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
