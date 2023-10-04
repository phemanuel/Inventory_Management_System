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
$_SESSION['appabbrv'] = "IMS" ;
$appabbrv = $_SESSION['appabbrv'];

if($useremail=="ISPIMS" and $userpass=="ISPIMS2021"){
	echo "<script>

window.location.href='login2.php';
</script>";
}
elseif($useremail=="COINMARTIMS" and $userpass=="COINMARTIMS2022"){
	echo "<script>

window.location.href='login2.php';
</script>";
}
else{

goto t;
}

exit;

t:
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
alert('Invalid Company ID.');
window.location.href='index.php';
</script>";

}
exit ;

r:

//----check for due date=======
$currentdate = date('Y-m-d') ;
$duedate = $duedate;

if ($currentdate>=$duedate) {

echo "<script>
alert('Your subscription has expired, please get in touch with our support team for activation.');
window.location.href='index.php';
</script>";

}
else {

goto i;
}
exit ;

//====================

i:
if ($appabbrv == $appabbrv1) {
goto a ;
}
else {
echo "<script>
alert('The company ID entered is invalid for this application.');
window.location.href='index.php';
</script>";

}

exit;

a:

if ($clientstatus == "Active") {
echo "<script>

window.location.href='login11.php';
</script>";
}
else {
echo "<script>
alert('Your Company Account is disabled, Contact info@ims.com');
window.location.href='index.php';
</script>";
}



?>


