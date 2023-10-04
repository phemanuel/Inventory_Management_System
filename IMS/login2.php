<?php
 //session_start(); 
 
  //=====admin login
include_once 'dbconfig.php';



// username and password sent from form 
$clientid=$_REQUEST['clientid']; 
$clientpass=$_REQUEST['clientpass']; 

$_SESSION['clientpass'] = $clientpass;
$_SESSION['clientid'] = $clientid ;
$_SESSION['user_name'] = $clientid;

$sql="SELECT * FROM clientreg WHERE clientid='$clientid' and clientpass='$clientpass'";
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
$clientstorage = $rowval['clientstorage'];
$duedate = $rowval['duedate'];
$clientlogo = $rowval['clientlogo'];

$_SESSION['clientid'] = $rowval['clientid'];
$_SESSION['clientname'] = $rowval['clientname'];
$_SESSION['clientstatus'] = $rowval['clientstatus'];
$_SESSION['clientplan'] = $rowval['clientplan'];
$_SESSION['clienttype'] = $rowval['clienttype'];
$_SESSION['clientsize'] = $rowval['clientsize'];
$_SESSION['clientstorage'] = $rowval['clientstorage'];
$_SESSION['clientemail'] = $rowval['clientemailaddy'];
$_SESSION['clientmobileno'] = $rowval['clientmobileno'];
$_SESSION['duedate'] = $rowval['duedate'];
$_SESSION['clientlogo'] = $rowval['clientlogo'];


}
goto a ;

}
else {
echo "<script>
alert('Invalid Company ID or Password.');
window.location.href='index.php';
</script>";

}
exit ;

a:

if ($clientstatus == "Active") {
goto f;
}
else {
echo "<script>
alert('Your Company Account is Inactive, Contact info@eitc.com');
window.location.href='index.php';
</script>";
}

exit ;

f:

$sql1="SELECT * FROM user_details WHERE user_email='$clientid' and user_password='$clientpass'";
$result1=mysqli_query($conn,$sql1);

// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
while($rowval = mysqli_fetch_array($result1))
 {

$usertype = $rowval['user_type'];
$userstatus = $rowval['user_status'];
$user_email = $rowval['user_email'];
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
$_SESSION['user_email'] = $rowval['user_email'];

//$picnamekeep= $rowval['picturename'];
echo "<script>
window.location.href='dashboard.php';
</script>";

}
}

?>


