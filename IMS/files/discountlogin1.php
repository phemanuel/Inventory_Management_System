<?php
 //session_start(); 
 
  //staff login
include_once 'dbconfig.php';



// username and password sent from form 
$clientid= $_SESSION['clientid'];; 
$admin_user=$_REQUEST['user_name']; 
$admin_pass=$_REQUEST['user_pass']; 
 
$_SESSION['admin_user'] = $admin_user ;
$_SESSION['admin_pass'] = $admin_pass ;


$sql="SELECT * FROM user_details WHERE user_email='$admin_user' and user_password='$admin_pass'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

$usertype = $rowval['user_type'];
$userstatus = $rowval['user_status'];
$ADM= $rowval['ADM'];
 $PMG= $rowval['PMG'];
 $WMG= $rowval['WMG'];
 $CMG= $rowval['CMG'];
 $HRG= $rowval['HRG'];
 $AMG= $rowval['AMG'];
 $RPT= $rowval['RPT'];
 $SMG= $rowval['SMG'];
 $_SESSION['ADM'] = $ADM ;
$_SESSION['PMG'] = $PMG ;
$_SESSION['WMG'] = $WMG ;
$_SESSION['CMG'] = $CMG ;
$_SESSION['HRG'] = $HRG ;
$_SESSION['AMG'] = $AMG ;
$_SESSION['RPT'] = $RPT ;
$_SESSION['SMG'] = $SMG ;
//$_SESSION['type'] = $rowval['user_type'];
//$_SESSION['user_id'] = $rowval['user_id'];
//$_SESSION['user_name'] = $rowval['user_name'];

//$picnamekeep= $rowval['picturename'];


}
goto c ;
//}

//header("location:adminpage.php");
}
else {
echo "<script>
alert('Invalid User ID or Password.');
window.location.href='checkout1.php';
</script>";
//header("location:adminsigninerror.html");
//echo "<tr><td><a>Invalid Username or Password.</a></td></tr>";
//echo "<tr><td><a href='adminsignin.html'>Back to Admin Login.</a></td></tr>";
}
exit ;

c:

if ($userstatus == "Active") {
echo "<script>

window.location.href='discountpage.php';
</script>";

}
else {
echo "<script>
alert('Your account is disabled, Contact HR');
window.location.href='chekout1.php';
</script>";
}



?>


