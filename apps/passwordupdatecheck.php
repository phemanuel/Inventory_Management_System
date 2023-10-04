<?php

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

//=============check for password update============

$sql11="SELECT * FROM password_update WHERE clientid='$clientid' and user_email='$useremail' and status= '1' ";
$result11=mysqli_query($conn,$sql11);

// Mysql_num_row is counting table row
$count11=mysqli_num_rows($result11);

if ($count11==1){
    
    echo "<script>
window.location.href='login1.php';
</script>";
}
else{
    
    echo "<script>
window.location.href='passwordupdate.php';
</script>";
}


?>