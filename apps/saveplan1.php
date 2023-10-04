<?php


$yearkeep = date('Y');
$clientname = $_REQUEST['clientid'];
$clientid = substr($clientname, 0, 5). $_SESSION['appabbrv'];
$clientpass = $clientid . $yearkeep;
$clientemail = $_REQUEST['clientemailaddy'];
$clientmobileno = $_REQUEST['clientmobileno'];
$datekeep = date('Y-m-d');
$clientplan = $_SESSION['clientplan'];
$clientstatus = "Inactive";
$clientsub = $_REQUEST['clientsub'];
$apptype = $_SESSION['apptype'];
$appabbrv = $_SESSION['appabbrv'];

if ($appabbrv == "IMS") {
$dbname = "IMS/dbconfig.php" ;
}
else if ($appabbrv == "EMS") {
$dbname = "EMS/dbconfig.php" ;
}
else if ($appabbrv == "HMS") {
$dbname = "HMS/dbconfig.php" ;
}
else if ($appabbrv == "AMS") {
$dbname = "AMS/dbconfig.php" ;
}

include ('$dbname');


if ($clientsub == "Monthly") {
$clientsub1 = "1";
}
else if ($clientsub == "Annually") {
$clientsub1 = "12";
}
//===================================
if ($clientplan == "BASIC" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['bpricekeep'];
$storagekeep = $_SESSION['bstoragekeep'];
$staffkeep = $_SESSION['bstaffkeep'];

}
else if ($clientplan == "BASIC" && $clientsub == "Annually") {
$pricekeep = $_SESSION['bpricekeepannual'];
$storagekeep = $_SESSION['bstoragekeep'];
$staffkeep = $_SESSION['bstaffkeep'];

}

else if ($clientplan == "STANDARD" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['spricekeep'];
$storagekeep = $_SESSION['sstoragekeep'];
$staffkeep = $_SESSION['sstaffkeep'];
}
else if ($clientplan == "STANDARD" && $clientsub == "Annually") {
$pricekeep = $_SESSION['spricekeepannual'];
$storagekeep = $_SESSION['sstoragekeep'];
$staffkeep = $_SESSION['sstaffkeep'];
}
else if ($clientplan == "PROFESSIONAL" && $clientsub == "Monthly") {
$pricekeep = $_SESSION['ppricekeep'];
$storagekeep = $_SESSION['pstoragekeep'];
$staffkeep = $_SESSION['pstaffkeep'];

}
else if ($clientplan == "PROFESSIONAL" && $clientsub == "Annually") {
$pricekeep = $_SESSION['ppricekeepannual'];
$storagekeep = $_SESSION['pstoragekeep'];
$staffkeep = $_SESSION['pstaffkeep'];

}



//================
$sql2="INSERT INTO user_details (user_email, user_password, user_name, user_type, clientid, user_status,ADM,PMG,WMG,CMG,HRG,AMG,RPT,SMG,department,apptype,appabbrv)
VALUES
('$clientid', '$clientpass','$clientname', 'master','$clientid', 'Inactive','Enable','Enable', 'Enable', 'Enable','Enable','Enable','Enable', 'Enable', 'Admin','$apptype','$appabbrv')";
  //$sql="INSERT INTO application(picturename) VALUES('$final_file')";
//$result = mysqli_query($conn, $sql );
//$result1=mysqli_query($conn,$sql1);
if (!mysqli_query($conn,$sql2))
{
die('error:' . mysqli_error($conn));
}

//=======================
  echo "<script>
alert('Account setup successful.');
window.location.href='../index.php';
</script>";


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
