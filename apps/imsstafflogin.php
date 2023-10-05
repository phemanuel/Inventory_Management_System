<?php


include ("imsdbconfig.php");


$clientid=$_SESSION['clientid']; 
$useremail=$_SESSION['user_email']; 
$userpass=$_SESSION['user_password']; 
$clientpass=$_SESSION['user_password']; 


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
  $TRD= $rowval['TRD'];
   $TRDREP= $rowval['TRDREP'];
   $DEL= $rowval['DEL'];
   $DIS= $rowval['DIS'];
   $REB= $rowval['REB'];
   $DELTRS= $rowval['DELTRS'];
   $_SESSION['DIS'] = $DIS ;
   $_SESSION['REB'] = $REB ;
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
$_SESSION['DELTRS'] = $DELTRS ;
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

if ($clientid=="ISPIMS") {

goto g ;

}
else if ($clientid=="COINMARTIMS") {

goto z ;

}
else if ($clientid=="RoyalIMS") {

goto V ;

}
else {

goto h ;
}

exit ;

g:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboarduserISP.php';
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
window.location.href='../IMS/dashboardCM.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboardCM.php';
</script>";
}

exit ;

V:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboarduserROYAL.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboarduserROYAL.php';
</script>";
}

exit ;

h:

if ($usertype == "master") {
echo "<script>
window.location.href='../IMS/dashboarduser.php';
</script>";
}
else if ($usertype == "user"){
echo "<script>
window.location.href='../IMS/dashboarduser.php';
</script>";
}
?>
