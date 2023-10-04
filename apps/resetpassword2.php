<?php
session_start();

include('imsdbconfig.php');

$user_email = $_SESSION['user_email'];
$user_password = $_REQUEST['user_password'];
$user_password1 = $_REQUEST['user_password1'];
//------check for password

if($user_password == $user_password1) {
	goto a;
}
else{

	echo "<script>
alert('Password do not match, re-enter again.')
window.location.href='resetpassword1.php';
</script>";
}
exit;
//======

a:
$sql = "UPDATE user_details SET  user_password= '$user_password' WHERE user_email = '$user_email' and user_status='Active' ";
$result=mysqli_query($conn,$sql);
//=================================
if (!mysqli_query($conn,$sql))
{
die('error:' . mysqli_error($conn));
}

echo "<script>
alert('Password reset successful, login into your account.')
window.location.href='https://ims.eitc.com.ng';
</script>";
?>