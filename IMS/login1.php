<?php
 //session_start(); 
 
  //staff login
include_once 'dbconfig.php';



// username and password sent from form 
$clientid=$_REQUEST['clientid']; 
$useremail=$_REQUEST['user_email']; 
$userpass=$_REQUEST['user_password']; 
$clientpass=$_REQUEST['user_password']; 
$_SESSION['clientpass'] = $clientpass;
$_SESSION['user_email'] = $useremail ;
$_SESSION['user_password'] = $userpass ;
$sql="SELECT * FROM clientreg WHERE clientid='$clientid'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
while($rowval = mysqli_fetch_array($result))
 {

$clientname = $rowval['clientname'];
$clientstatus = $rowval['clientstatus'];
$clientplan = $rowval['clientplan'];
$clienttype = $rowval['clienttype'];
$clientsize = $rowval['clientsize'];
$clientlogo = $rowval['clientlogo'];

$_SESSION['clientid'] = $rowval['clientid'];
$_SESSION['clientname'] = $rowval['clientname'];
$_SESSION['clientstatus'] = $rowval['clientstatus'];
$_SESSION['clientplan'] = $rowval['clientplan'];
$_SESSION['clienttype'] = $rowval['clienttype'];
$_SESSION['clientsize'] = $rowval['clientsize'];
$_SESSION['clientlogo'] = $rowval['clientlogo'];
$_SESSION['clientemail'] = $rowval['clientemailaddy'];
$_SESSION['clientmobileno'] = $rowval['clientmobileno'];
//$picnamekeep= $rowval['picturename'];


}
goto a ;

}
else {
echo "<script>
alert('Invalid Company ID.');
window.location.href='index.php';
</script>";

}
exit ;

a:

if ($clientstatus == "Active") {
goto b;
}
else {
echo "<script>
alert('Your Company Account is disabled, Contact info@ims.com');
window.location.href='index.php';
</script>";
}

exit ;

b:

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
$_SESSION['type'] = $rowval['user_type'];
$_SESSION['user_id'] = $rowval['user_id'];
$_SESSION['user_name'] = $rowval['user_name'];

//$picnamekeep= $rowval['picturename'];


}
goto c ;
//}

//header("location:adminpage.php");
}
else {
echo "<script>
alert('Invalid User ID or Password.');
window.location.href='index.php';
</script>";
//header("location:adminsigninerror.html");
//echo "<tr><td><a>Invalid Username or Password.</a></td></tr>";
//echo "<tr><td><a href='adminsignin.html'>Back to Admin Login.</a></td></tr>";
}
exit ;

c:

if ($userstatus == "Active") {
goto d;
}
else {
echo "<script>
alert('Your account is disabled, Contact HR');
window.location.href='index.php';
</script>";
}

exit ;

d:
if ($usertype == "master") {
echo "<script>
window.location.href='dashboard.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='dashboarduser.php';
</script>";
}

?>


