<?php
 //session_start(); 
 
  //staff login
include 'dbconfig.php';



// username and password sent from form 
$useremail=$_REQUEST['user_email']; 
$userpass=$_REQUEST['user_password']; 
$clientpass=$_REQUEST['user_password']; 
$_SESSION['clientpass'] = $clientpass;
$_SESSION['user_email'] = $useremail ;
$_SESSION['user_password'] = $userpass ;
$_SESSION['appabbrv'] = "IMS" ;
$appabbrv = $_SESSION['appabbrv'];


//==========get clientid--------------

$sql1="SELECT * FROM user_details WHERE user_email='$useremail' and user_password = '$userpass'";
$result1=mysqli_query($conn,$sql1);
// Mysql_num_row is counting table row
$count1=mysqli_num_rows($result1);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count1==1){
while($rowval = mysqli_fetch_array($result1))
 {

$clientid = $rowval['clientid'];
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
  $TRD= $rowval['TRD'];
   $TRDREP= $rowval['TRDREP'];
   $DEL= $rowval['DEL'];
   $DIS= $rowval['DIS'];
   $REB= $rowval['REB'];
 $_SESSION['ADM'] = $ADM ;
$_SESSION['PMG'] = $PMG ;
$_SESSION['WMG'] = $WMG ;
$_SESSION['CMG'] = $CMG ;
$_SESSION['HRG'] = $HRG ;
$_SESSION['AMG'] = $AMG ;
$_SESSION['RPT'] = $RPT ;
$_SESSION['SMG'] = $SMG ;
$_SESSION['TRD'] = $TRD ;
$_SESSION['TRDREP'] = $TRDREP ;
$_SESSION['DEL'] = $DEL ;
$_SESSION['DIS'] = $DIS ;
$_SESSION['REB'] = $REB ;
$_SESSION['type'] = $rowval['user_type'];
$_SESSION['user_id'] = $rowval['user_id'];
$_SESSION['user_name'] = $rowval['user_name'];
$_SESSION['clientid'] = $clientid ;
}
goto f ;

}
else {
	echo "<script>
alert('Invalid User ID or Password.');
window.location.href='../apps/index.php';
</script>";
}

//=========
exit;

f:
//===check client subscripton============
$sql2="SELECT * FROM clientreg WHERE clientid='$clientid'";
$result2=mysqli_query($conn,$sql2);

// Mysql_num_row is counting table row
$count2=mysqli_num_rows($result2);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count2==1){
while($rowval = mysqli_fetch_array($result2))
 {

$clientname = $rowval['clientname'];
$clientstatus = $rowval['clientstatus'];
$clientplan = $rowval['clientplan'];
$clienttype = $rowval['clienttype'];
$clientsize = $rowval['clientsize'];
$clientlogo = $rowval['clientlogo'];
$appabbrv1 = $rowval['appabbrv'];
$prodsize = $rowval['productsize'];
$duedate = $rowval['duedate'];

$_SESSION['clientid'] = $rowval['clientid'];
$_SESSION['clientname'] = $rowval['clientname'];
$_SESSION['clientstatus'] = $rowval['clientstatus'];
$_SESSION['clientplan'] = $rowval['clientplan'];
$_SESSION['clienttype'] = $rowval['clienttype'];
$_SESSION['clientsize'] = $rowval['clientsize'];
$_SESSION['clientlogo'] = $rowval['clientlogo'];
$_SESSION['clientemail'] = $rowval['clientemailaddy'];
$_SESSION['clientmobileno'] = $rowval['clientmobileno'];
$_SESSION['prodsize'] = $rowval['productsize'];
$_SESSION['duedate'] = $rowval['duedate'];
//$picnamekeep= $rowval['picturename'];


}
goto r ;

}
else {
echo "<script>
alert('Company has not been profiled yet.');
window.location.href='../apps/index.php';
</script>";

}
exit ;

r:

//----check for due date=======
$currentdate = date('Y-m-d') ;
$duedate = $duedate;

if ($currentdate==$duedate) {

echo "<script>
alert('Your subscription has expired, please get in touch with our support team for activation on support@eitc.com.ng.');
window.location.href='../apps/index.php';
</script>";

}
else {

goto i;
}
exit ;

//====================

i:

if ($clientstatus == "Active") {
goto c;
}
else {
echo "<script>
alert('Your Company Account is disabled, Contact our support team on support@eitc.com.ng');
window.location.href='../apps/index.php';
</script>";
}

exit;

c:

if ($userstatus == "Active") {
goto d;
}
else {
echo "<script>
alert('Your account is disabled, Contact HR');
window.location.href='../apps/index.php';
</script>";
}

exit ;

d:

if ($clientid=="ISPIMS") {

goto g ;

}
else if ($clientid=="COINMARTIMS") {

goto z ;

}
else {

goto h ;
}

exit ;

g:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboardmaster.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboarduserISP.php';
</script>";
}

exit ;

z:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboardmaster.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboardCM.php';
</script>";
}

exit ;

h:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboardmaster.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboarduser.php';
</script>";
}

?>


