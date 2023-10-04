<?php
include ('dbconfig.php');


//===============get details from the db
$clientid = $_SESSION['clientid'];
$clienttypeold= $_SESSION['currentplan'];
$clienttypenew= $_SESSION['upgradeplan'];
$startdate1= $_REQUEST['startdate'];
$startdate= date("Y-m-d", strtotime($startdate1));  
$enddate1= $_REQUEST['enddate'];
$enddate= date("Y-m-d", strtotime($enddate1));
$clientsub = $_SESSION['clientsub'];
$clientprice = $_SESSION['clientprice'];

if ($clienttypeold == $clienttypenew) {
echo "<script>
alert('The account is already on the plan you selected for upgrade.');
window.location.href='upgradeaccount1.php';
</script>";
}

else {
goto d ;
}

exit ;

d:

if ($clientsub == "Monthly") {
$clientplan = "1";
}
else if ($clientsub == "Annually") {
$clientplan = "12";
}
//===============
if ($clienttypenew == "BASIC") {
$staffkeep = "10";
$storagekeep = "2GB";
}
else if ($clienttypenew == "STANDARD") {
$staffkeep = "20";
$storagekeep = "5GB";
}
else if ($clienttypenew == "PROFESSIONAL") {
$staffkeep = "100";
$storagekeep = "20GB";
}
//=====================

$sql2 = "UPDATE clientreg SET clienttype = '$clienttypenew' ,clientplan = '$clientplan',clientsize = '$staffkeep', clientsub = '$clientsub',clientpay = '$clientprice',clientstorage = '$storagekeep',startdate = '$startdate',duedate = '$enddate'  WHERE clientid='$clientid' ";
$result2=mysqli_query($conn,$sql2);

//===================
$sql3= "UPDATE accountupgrade SET upgradestatus = 'Active'  WHERE clientid='$clientid' ";
$result3=mysqli_query($conn,$sql3);

echo "<script>
alert('Account upgrade successful.');
window.location.href='adminpage.php';
</script>";
?>
